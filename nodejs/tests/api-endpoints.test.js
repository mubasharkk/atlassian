
const server = require('../app.js');
const supertest = require('supertest');
const requestWithSupertest = supertest(server);

afterAll((done) => {
    done();
});

describe('Test Addon Endpoint', () => {

    it('GET /api/addons should show list of addons from Atlassian API', async () => {
        const res = await requestWithSupertest.get('/api/addons');
        expect(res.status).toEqual(200);
        expect(res.body).toHaveProperty('data');

        res.body.data.forEach( (obj) => {
            expect(obj).toHaveProperty('categories')
            expect(obj).toHaveProperty('name')
            expect(obj).toHaveProperty('id')
            expect(obj).toHaveProperty('key')
            expect(obj).toHaveProperty('vendor')
            expect(obj).toHaveProperty('downloads')
            expect(obj).toHaveProperty('totalInstalls')
            expect(obj).toHaveProperty('totalUsers')
        });
    });

    it('GET / test an unknow route', async () => {
        const res = await requestWithSupertest.get('/demo');
        expect(res.status).toEqual(404);
    });

    it('GET /api/addons should show list request with query params (filter by categories)', async () => {
        const res = await requestWithSupertest.get('/api/addons').query({
            category: 'Deployments'
        });
        expect(res.status).toEqual(200);
        expect(res.body).toHaveProperty('data');

        res.body.data.forEach( (obj) => {
            expect(obj).toHaveProperty('categories')
            expect(obj.categories).toContain('Deployments')
        });
    });


});