module.exports = {
    runtimeCompiler: true,
    pwa: {
        workboxOptions: {
            //skipWaiting: true,
            //clientsClaim: true,
            runtimeCaching: [{
                urlPattern: new RegExp('^https://rulestorear.dk/api/public/api/products'),
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

