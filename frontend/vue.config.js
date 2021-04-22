module.exports = {
    pwa: {
        workboxOptions: {
            //skipWaiting: true,
            //clientsClaim: true,
            runtimeCaching: [{
                urlPattern: new RegExp('^http://127.0.0.1:8000/api/products'),
                handler: 'NetworkFirst',
                method: 'GET',
                    options: {
                        cacheName: 'RuleStore-cache'
                    }
            },
        ]
        }
    }
}