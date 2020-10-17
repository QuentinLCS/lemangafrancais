<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\home\\HomeController::localRedirection'], null, null, null, false, false, null]],
        '/signout' => [[['_route' => 'signout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/error/(\\d+)(?:\\.([^/]++))?(*:34)'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:58)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:103)'
                            .'|router(*:117)'
                            .'|exception(?'
                                .'|(*:137)'
                                .'|\\.css(*:150)'
                            .')'
                        .')'
                        .'|(*:160)'
                    .')'
                .')'
                .'|/([^/]++)/(?'
                    .'|admin(?'
                        .'|/(?'
                            .'|bugs(?'
                                .'|(*:202)'
                                .'|/edit\\-([edit\\-0-9]*)(*:231)'
                            .')'
                            .'|help(?'
                                .'|(*:247)'
                                .'|/edit\\-([edit\\-0-9]*)(*:276)'
                            .')'
                            .'|lexicon(?'
                                .'|(*:295)'
                                .'|/([^/]++)(?'
                                    .'|(*:315)'
                                .')'
                            .')'
                            .'|news(?'
                                .'|(*:332)'
                                .'|/(?'
                                    .'|edit\\-([edit\\-0-9]*)(*:364)'
                                    .'|new(*:375)'
                                    .'|([^/]++)(*:391)'
                                .')'
                            .')'
                            .'|posts(*:406)'
                            .'|r(?'
                                .'|e(?'
                                    .'|cruitment(?'
                                        .'|(*:434)'
                                        .'|/(?'
                                            .'|([a-z0-9\\-]*)\\-([^/]++)(*:469)'
                                            .'|([^/]++)(*:485)'
                                            .'|([a-z0-9\\-]*)\\-([^/]++)/([^/]++)(*:525)'
                                            .'|([^/\\-]++)\\-([^/]++)/([^/]++)/(?'
                                                .'|delete(*:572)'
                                                .'|accept(*:586)'
                                                .'|refuse(*:600)'
                                            .')'
                                        .')'
                                    .')'
                                    .'|ports(*:616)'
                                .')'
                                .'|anks(?'
                                    .'|(*:632)'
                                    .'|/(?'
                                        .'|([a-z0-9\\-]*)\\-([^/]++)(*:667)'
                                        .'|([^/]++)(*:683)'
                                    .')'
                                .')'
                            .')'
                            .'|suggestions(?'
                                .'|(*:708)'
                                .'|/edit\\-([edit\\-0-9]*)(*:737)'
                            .')'
                            .'|users(?'
                                .'|(*:754)'
                                .'|/([^/]++)(*:771)'
                            .')'
                        .')'
                        .'|(*:781)'
                    .')'
                    .'|illustration(?'
                        .'|(*:805)'
                        .'|/([^/]++)(*:822)'
                    .')'
                    .'|manga(?'
                        .'|(*:839)'
                        .'|/([^/]++)(*:856)'
                    .')'
                    .'|recruitment(?'
                        .'|(*:879)'
                        .'|/(?'
                            .'|([a-z0-9\\-]*)\\-([^/]++)(*:914)'
                            .'|([a-z0-9\\-]*)\\-([^/]++)/apply(*:951)'
                        .')'
                    .')'
                    .'|scenario(?'
                        .'|(*:972)'
                        .'|/([^/]++)(*:989)'
                    .')'
                .')'
                .'|/(en|fr)(*:1007)'
                .'|/([^/]++)/(?'
                    .'|lexicon(*:1036)'
                    .'|news(?'
                        .'|(*:1052)'
                        .'|/([^/]++)(*:1070)'
                    .')'
                    .'|a(?'
                        .'|bout(*:1088)'
                        .'|dd(?'
                            .'|Illustration(*:1114)'
                            .'|Manga(*:1128)'
                            .'|Scenario(*:1145)'
                        .')'
                    .')'
                    .'|s(?'
                        .'|ign(?'
                            .'|in(*:1168)'
                            .'|up(*:1179)'
                        .')'
                        .'|upport(*:1195)'
                    .')'
                    .'|users(?'
                        .'|(*:1213)'
                        .'|/([^/]++)(?'
                            .'|(*:1234)'
                            .'|/(?'
                                .'|show_(?'
                                    .'|manga(*:1260)'
                                    .'|scenario(*:1277)'
                                    .'|illustration(*:1298)'
                                .')'
                                .'|add(?'
                                    .'|Manga(*:1319)'
                                    .'|Scenario(*:1336)'
                                .')'
                            .')'
                            .'|(*:1347)'
                        .')'
                    .')'
                    .'|index(?'
                        .'|Illustration(*:1378)'
                        .'|Manga(*:1392)'
                        .'|Scenario(*:1409)'
                    .')'
                .')'
                .'|/media/cache/resolve/(?'
                    .'|([A-z0-9_-]*)/rc/([^/]++)/(.+)(*:1474)'
                    .'|([A-z0-9_-]*)/(.+)(*:1501)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        34 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        58 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        103 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        117 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        137 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        150 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        160 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        202 => [[['_route' => 'admin.bugs.index', '_controller' => 'App\\Controller\\admin\\AdminBugsController::index'], ['_locale'], null, null, false, false, null]],
        231 => [[['_route' => 'admin.bugs.show', '_controller' => 'App\\Controller\\admin\\AdminBugsController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        247 => [[['_route' => 'admin.help.index', '_controller' => 'App\\Controller\\admin\\AdminHelpController::index'], ['_locale'], null, null, false, false, null]],
        276 => [[['_route' => 'admin.help.show', '_controller' => 'App\\Controller\\admin\\AdminHelpController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        295 => [[['_route' => 'admin.lexicon.index', '_controller' => 'App\\Controller\\admin\\AdminLexiconController::index'], ['_locale'], null, null, false, false, null]],
        315 => [
            [['_route' => 'admin.lexicon.delete', '_controller' => 'App\\Controller\\admin\\AdminLexiconController::delete'], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'admin.lexicon.show', '_controller' => 'App\\Controller\\admin\\AdminLexiconController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null],
        ],
        332 => [[['_route' => 'admin.news.index', '_controller' => 'App\\Controller\\admin\\AdminNewsController::index'], ['_locale'], null, null, false, false, null]],
        364 => [[['_route' => 'admin.news.show', '_controller' => 'App\\Controller\\admin\\AdminNewsController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        375 => [[['_route' => 'admin.news.new', '_controller' => 'App\\Controller\\admin\\AdminNewsController::new'], ['_locale'], null, null, false, false, null]],
        391 => [[['_route' => 'admin.news.delete', '_controller' => 'App\\Controller\\admin\\AdminNewsController::delete'], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null]],
        406 => [[['_route' => 'admin.posts.index', '_controller' => 'App\\Controller\\admin\\AdminPostsController::index'], ['_locale'], null, null, false, false, null]],
        434 => [[['_route' => 'admin.recruitment.index', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::index'], ['_locale'], null, null, false, false, null]],
        469 => [[['_route' => 'admin.recruitment.show', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::show'], ['_locale', 'slug', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        485 => [[['_route' => 'admin.recruitment.delete', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::delete'], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null]],
        525 => [[['_route' => 'admin.application.show', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::showApplication'], ['_locale', 'slug', 'jobId', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        572 => [[['_route' => 'admin.application.delete', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::deleteApplication'], ['_locale', 'slug', 'jobId', 'id'], ['DELETE' => 0], null, false, false, null]],
        586 => [[['_route' => 'admin.application.accept', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::acceptApplication'], ['_locale', 'slug', 'jobId', 'id'], ['ACCEPT' => 0], null, false, false, null]],
        600 => [[['_route' => 'admin.application.refuse', '_controller' => 'App\\Controller\\admin\\AdminRecruitmentController::refuseApplication'], ['_locale', 'slug', 'jobId', 'id'], ['REFUSE' => 0], null, false, false, null]],
        616 => [[['_route' => 'admin.reports.index', '_controller' => 'App\\Controller\\admin\\AdminReportsController::index'], ['_locale'], null, null, false, false, null]],
        632 => [[['_route' => 'admin.roles.index', '_controller' => 'App\\Controller\\admin\\AdminRolesController::index'], ['_locale'], null, null, false, false, null]],
        667 => [[['_route' => 'admin.roles.show', '_controller' => 'App\\Controller\\admin\\AdminRolesController::show'], ['_locale', 'slug', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        683 => [[['_route' => 'admin.roles.delete', '_controller' => 'App\\Controller\\admin\\AdminRolesController::delete'], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null]],
        708 => [[['_route' => 'admin.suggestions.index', '_controller' => 'App\\Controller\\admin\\AdminSuggestionsController::index'], ['_locale'], null, null, false, false, null]],
        737 => [[['_route' => 'admin.suggestions.show', '_controller' => 'App\\Controller\\admin\\AdminSuggestionsController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        754 => [[['_route' => 'admin.users.index', '_controller' => 'App\\Controller\\admin\\AdminUsersController::index'], ['_locale'], null, null, false, false, null]],
        771 => [[['_route' => 'admin.users.show', '_controller' => 'App\\Controller\\admin\\AdminUsersController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        781 => [[['_route' => 'admin.index', '_controller' => 'App\\Controller\\admin\\AdminController::index'], ['_locale'], null, null, false, false, null]],
        805 => [[['_route' => 'illustration.index', '_controller' => 'App\\Controller\\creation\\IllustrationController::index'], ['_locale'], null, null, false, false, null]],
        822 => [[['_route' => 'illustration.show', '_controller' => 'App\\Controller\\creation\\IllustrationController::show'], ['_locale', 'id'], null, null, false, true, null]],
        839 => [[['_route' => 'manga.index', '_controller' => 'App\\Controller\\creation\\MangaController::index'], ['_locale'], null, null, false, false, null]],
        856 => [[['_route' => 'manga.show', '_controller' => 'App\\Controller\\creation\\MangaController::show'], ['_locale', 'id'], null, null, false, true, null]],
        879 => [[['_route' => 'recruitment.index', '_controller' => 'App\\Controller\\creation\\RecruitmentController::index'], ['_locale'], null, null, false, false, null]],
        914 => [[['_route' => 'recruitment.show', '_controller' => 'App\\Controller\\creation\\RecruitmentController::show'], ['_locale', 'slug', 'id'], null, null, false, true, null]],
        951 => [[['_route' => 'recruitment.apply', '_controller' => 'App\\Controller\\creation\\RecruitmentController::apply'], ['_locale', 'slug', 'id'], null, null, false, false, null]],
        972 => [[['_route' => 'scenario.index', '_controller' => 'App\\Controller\\creation\\ScenarioController::index'], ['_locale'], null, null, false, false, null]],
        989 => [[['_route' => 'scenario.show', '_controller' => 'App\\Controller\\creation\\ScenarioController::show'], ['_locale', 'id'], null, null, false, true, null]],
        1007 => [[['_route' => 'home.index', '_controller' => 'App\\Controller\\home\\HomeController::index'], ['_locale'], null, null, false, true, null]],
        1036 => [[['_route' => 'lexicon.index', '_controller' => 'App\\Controller\\lexicon\\LexiconController::index'], ['_locale'], null, null, false, false, null]],
        1052 => [[['_route' => 'news.index', '_controller' => 'App\\Controller\\news\\NewsController::index'], ['_locale'], null, null, false, false, null]],
        1070 => [[['_route' => 'news.show', '_controller' => 'App\\Controller\\news\\NewsController::show'], ['_locale', 'id'], null, null, false, true, null]],
        1088 => [[['_route' => 'about.index', '_controller' => 'App\\Controller\\other\\AboutController::index'], ['_locale'], null, null, false, false, null]],
        1114 => [[['_route' => 'users.addIllustration', '_controller' => 'App\\Controller\\user\\UsersIllustrationController::addIllustration'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1128 => [[['_route' => 'usersManga.addManga', '_controller' => 'App\\Controller\\user\\UsersMangaController::addManga'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1145 => [[['_route' => 'usersScenario.addScenario', '_controller' => 'App\\Controller\\user\\UsersScenarioController::addScenario'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1168 => [[['_route' => 'signin', '_controller' => 'App\\Controller\\security\\SecuritySigninController::signin'], ['_locale'], null, null, false, false, null]],
        1179 => [[['_route' => 'signup', '_controller' => 'App\\Controller\\security\\SecuritySignupController::signup'], ['_locale'], null, null, false, false, null]],
        1195 => [[['_route' => 'support.index', '_controller' => 'App\\Controller\\support\\SupportController::index'], ['_locale'], null, null, false, false, null]],
        1213 => [[['_route' => 'users.index', '_controller' => 'App\\Controller\\user\\UsersController::index'], ['_locale'], null, null, false, false, null]],
        1234 => [[['_route' => 'users.show', '_controller' => 'App\\Controller\\user\\UsersController::show'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1260 => [[['_route' => 'users.show_manga', '_controller' => 'App\\Controller\\user\\UsersController::show_manga'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1277 => [[['_route' => 'users.show_scenario', '_controller' => 'App\\Controller\\user\\UsersController::show_scenario'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1298 => [[['_route' => 'users.show_illustration', '_controller' => 'App\\Controller\\user\\UsersController::show_illustration'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1319 => [[['_route' => 'users.addManga', '_controller' => 'App\\Controller\\user\\UsersController::addManga'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1336 => [[['_route' => 'users.addScenario', '_controller' => 'App\\Controller\\user\\UsersController::addScenario'], ['_locale', 'id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1347 => [[['_route' => 'admin.users.delete', '_controller' => 'App\\Controller\\user\\UsersController::delete'], ['_locale', 'id'], ['DELETE' => 0], null, false, true, null]],
        1378 => [[['_route' => 'usersIllustration.index', '_controller' => 'App\\Controller\\user\\UsersIllustrationController::index'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1392 => [[['_route' => 'usersManga.index', '_controller' => 'App\\Controller\\user\\UsersMangaController::index'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1409 => [[['_route' => 'usersScenario.index', '_controller' => 'App\\Controller\\user\\UsersScenarioController::index'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1474 => [[['_route' => 'liip_imagine_filter_runtime', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterRuntimeAction'], ['filter', 'hash', 'path'], ['GET' => 0], null, false, true, null]],
        1501 => [
            [['_route' => 'liip_imagine_filter', '_controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterAction'], ['filter', 'path'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
