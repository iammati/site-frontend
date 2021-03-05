page = PAGE
page {
    typeNum = 0
    config.linkVars = L

    // Default language
    config.sys_language_uid = 0
    config.language = de
    config.locale_all = de_DE.UTF-8
    config.htmlTag_setParams = lang='de' dir='ltr'

    config.absRefPrefix = /
    config.simulateStaticDocuments = 0
    config.prefixLocalAnchors = all
    config.no_cache = 1
    config.cache = 0
    config.noPageTitle = 2

    // FLUIDTEMPLATE page object
    10 = FLUIDTEMPLATE
    10 {
        layoutRootPaths {
            10 = EXT:site_frontend/Resources/Private/Layouts/
        }

        partialRootPaths {
            10 = EXT:site_frontend/Resources/Private/Partials/
            15 = EXT:site_frontend/Resources/Private/Fluid/Content/Partials/
        }

        templateRootPaths {
            10 = EXT:site_frontend/Resources/Private/Templates/Page/
        }

        templateName = TEXT
        templateName {
            data = levelfield:-1, backend_layout_next_level, slide
            override.field = backend_layout

            split {
                token = pagets__
                1.current = 1
                1.wrap = |
            }
        }

        variables {
            // Declaring of Content Render Types for Backend Layouts
            content = CONTENT
            content {
                table = tt_content

                select {
                    orderBy = sorting
                    where = colPos = 0
                    languageField = 
                }
            }
        }
    }
}

@import 'EXT:site_frontend/Configuration/TypoScript/Page/*.ts'
