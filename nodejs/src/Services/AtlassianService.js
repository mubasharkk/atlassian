'use strict'

const { AddonItem } = require('./../DataTransferObjects/AddonItem');

class AtlassianService {
    axios = null;

    constructor() {
        this.axios = require('axios')
    }

    async getAddons(queryParams) {
        return await this.axios
            // this can be made configurable
            .get('https://marketplace.atlassian.com/rest/2/addons', {params: queryParams})
            // for a successful response send the API response transformed via AddonItem class
            .then((response) => {
                //transform the response to addon json-able objects
                let data = response.data['_embedded']['addons'].map( (item, index) => {
                    return new AddonItem(item)
                });
                return {
                    statusCode: 200,
                    data: data
                };
            })
            .catch((err) => {
                return {
                    statusCode: 400,
                    errors: err.response.data.errors
                }
            });
    }
}

module.exports = {
    AtlassianService
}