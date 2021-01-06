page {
    headerData {
        // Critical-CSS (Above the fold)
        // 5 = TEMPLATE
        // 5 {
        //     stdWrap.wrap = <style rel='critical' type='text/css'>|</style>
        //     template = FILE
        //     template.file = EXT:site_backend/Resources/Public/css/critical/app.min.css
        // }

        // Appending into head-tag the .min.css
        10 = TEXT
        10.wrap (
            <link rel='stylesheet' type='text/css' href='/typo3conf/ext/site_frontend/Resources/Public/css/app.min.css' media='all'>
        )

        // Generating the title tag
        900 = TEXT
        900 {
            field = title
            noTrimWrap = |<title>|</title>|
        }
    }
}
