const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => {
    return res.send({
        'version': '1.0.0',
        'availableRoutes' : [
            'GET /api/addons'
        ]
    });
})

app.listen(port, () => {
    console.log(`MubasharKk NodeJs App is listening on port ${port}`)
})