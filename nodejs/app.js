const express = require('express')
const app = express()
const port = 3001

const {AtlassianService} = require('./src/Services/AtlassianService');

app.get('/api/addons', async (req, res) => {
    let service = new AtlassianService();
    (new Promise((resolve, reject) => {
        // console.log(resolve, reject);
        return resolve(service.getAddons(req.query));
    })).then((response) => {
        res.status(response.statusCode);
        if (response.statusCode === 200) {
            res.json({
                data: response.data
            });
        } else {
            res.json({
                errors: response.errors
            });
        }
    });
});

app.get('/', (req, res) => {
    return res.json({
        'version': '1.0.0',
        'availableRoutes': [
            'GET /api/addons'
        ]
    });
})

app.get('*', (req, res) => {
    return res.json({
        'error': 'Route not found'
    });
});

app.listen(port, () => {
    console.log(`MubasharKk NodeJs App is listening on port ${port}`)
})