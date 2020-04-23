module.exports = {
    "transpileDependencies": [
        "vuetify"
    ],

    pwa: {
        name: 'DMW++',
        themeColor: '#03A9F4',
        msTileColor: '#03A9F4',
        iconPaths: {
            favicon16: 'img/icons/favicon-16x16.png',
            favicon32: 'img/icons/favicon-32x32.png',
            appleTouchIcon: 'img/icons/apple-touch-icon.png',
            maskIcon: 'img/icons/safari-pinned-tab.svg',
            msTileImage: 'img/icons/mstile-150x150.png'
        },
        manifestOptions: {
            name: 'DMW++',
            short_name: 'DMW++',
            start_url: process.env.VUE_APP_BASE_URL,
            lang: 'id-ID',
            display: 'standalone',
            background_color: '#ffffff',
            theme_color: '#03A9F4',
            description: 'DMW++',
            icons: [
                {
                    src: 'img/icons/android-chrome-192x192.png',
                    sizes: '192x192',
                    type: 'image/png'
                }, {
                    src: 'img/icons/android-chrome-384x384.png',
                    sizes: '384x384',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-114x114.png',
                    sizes: '114x114',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-120x120.png',
                    sizes: '120x120',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-144x144.png',
                    sizes: '144x144',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-152x152.png',
                    sizes: '152x152',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-180x180.png',
                    sizes: '180x180',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-57x57.png',
                    sizes: '57x57',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-60x60.png',
                    sizes: '60x60',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-72x72.png',
                    sizes: '72x72',
                    type: 'image/png'
                }, {
                    src: 'img/icons/apple-touch-icon-76x76.png',
                    sizes: '76x76',
                    type: 'image/png'
                }
            ]
        }
    }
}
