page = PAGE
page {
    typeNum = 0

    config {
        no_cache = 1
        cache = 0
        noPageTitle = 2
    }

    10 = FLUIDTEMPLATE
    10 {
        layoutRootPaths {
            10 = EXT:site_frontend/Resources/Private/Page/Layouts/
        }

        partialRootPaths {
            10 = EXT:site_frontend/Resources/Private/Page/Partials/
            15 = EXT:site_frontend/Resources/Private/Fluid/Content/Partials/
        }

        templateRootPaths {
            10 = EXT:site_frontend/Resources/Private/Page/Templates/
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
            content = CONTENT
            content {
                table = tt_content

                select {
                    orderBy = sorting
                    where = {#colPos}=0
                }
            }
        }
    }
}
