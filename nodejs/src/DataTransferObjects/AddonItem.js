'use strict'

const ATLASIAN_DOMAIN = 'https://marketplace.atlassian.com';

class AddonItem {
    constructor(data) {
        let embeddedData = data['_embedded'];
        this.key = data['key'];
        this.id = data['id'];
        this.name = data['name'];
        this.description = data['summary'];
        this.link = this.atlassianUrl(data['_links']['alternate']['href']);
        this.status = data['status'];
        this.categories = embeddedData['categories'].map((category, index) => {
            return category['name'];
        });
        this.vendor = {
            name: embeddedData['vendor']['name'],
            programs: {
                topVendorStatus: embeddedData['vendor']['programs']['topVendor']['status']
            },
            link: this.atlassianUrl(embeddedData['vendor']['_links']['alternate']['href']),
        };
        this.reviews = embeddedData['reviews'];
        this.downloads = embeddedData['distribution']['downloads'];
        this.totalInstalls = embeddedData['distribution']['totalInstalls'] ?? 0;
        this.totalUsers = ['distribution']['totalUsers'] ?? 0;
        // this.logo = embeddedData['logo']['_links']['highRes']['href'] ?? embeddedData['logo']['_links']['image']['href'];
    }

    atlassianUrl(path) {
        return ATLASIAN_DOMAIN + path;
    }
}

module.exports = {
    AddonItem
}