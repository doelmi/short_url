<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Short URL at S.DOELMI.ID - Super Free URL Shorting and API Support">
    <meta name="author" content="Abdullah Fahmi">
    <link rel="icon" type="image/png" href="{{ url('images/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('images/favicon-16x16.png') }}" sizes="16x16" />
    <title>Short URL at S.DOELMI.ID</title>
    <!--stylesheet-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('styles/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('styles/custom-responsive-styles.css') }}" rel="stylesheet" type="text/css">
    <!--scripts-->
    <script type="text/javascript" src="{{ url('scripts/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('scripts/all-plugins.js') }}"></script>
    <script type="text/javascript" src="{{ url('scripts/plugins-activate.js') }}"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body id="page-top">
    <!-- Navigation -->
    <div class="logo">
        <i class="fa fa-link" aria-hidden="true"><span>S.DOELMI.ID</span></i>
    </div>
    <a class="menu-toggle rounded" href="#">
        <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a class="smooth-scroll" href="#Header"></a>
            </li>
            <li class="sidebar-nav-item">
                <a class="smooth-scroll" href="#page-top">Home</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="smooth-scroll" href="#Result" id="hrefResult">Result</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="smooth-scroll" href="#Contact">API Documentation</a>
            </li>
        </ul>
    </nav>
    <section id="Banner" class="content-section">
        <div class="container content-wrap text-center">
            <h1>Short URL at S.DOELMI.ID</h1>
            <h3>
                <em>Super Free URL Shorting and API Support</em>
            </h3>
            <form action="{{ route('short') }}" class="px-5" id="submitShort">
                <div class="input-group input-group-lg mb-3 px-5">
                    <input type="text" class="form-control" name="short_an_url" placeholder="Short an URL" aria-label="Short an URL" aria-describedby="button-short" required autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-xl" type="submit" id="button-short">SHORT</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="overlay"></div>
    </section>
    <section id="Result" class="content-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-heading">
                        <h2>Result</h2>
                        <p>Shorten URL will be displayed here.</p>
                    </div>
                    <p class="lead" id="real_url">Real URL : {url}</p>
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-md-7">
                            <div class="input-group input-group-lg mb-3 px-5">
                                <input type="text" class="form-control bg-white" id="shorten_url" name="shorten_url" readonly placeholder="Shorten URL" aria-label="Shorten URL" aria-describedby="button-copy">
                                <div class="input-group-append">
                                    <a href="javascript:void(0)">
                                        <button class="btn btn-primary btn-xl" type="button" id="button-copy" onclick="copy()">COPY</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Contact" class="content-section">
        <div class="container">
            <div class="block-heading">
                <h2>API Documentation</h2>
                <p>Free using API Short URL S.DOELMI.ID</p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="contact-wrapper">
                        <div class="address-block border-bottom">
                            <h3 class="add-title">Setting</h3>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-gear" aria-hidden="true"></i></span><span class="c-info">Method: GET</span>
                            </div>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-link" aria-hidden="true"></i></span><span class="c-info">Endpoint: {{ route('short') }}</span>
                            </div>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-file" aria-hidden="true"></i></span><span class="c-info">Params: url</span>
                            </div>
                            <div class="c-detail">
                                <span class="c-info text-left ml-0 text-danger">Note! If you are using PHP please use urlencode() function. If other language, please use urlencode() function look a like.</span>
                            </div>
                        </div>
                        <div class="address-block">
                            <h3 class="add-title">Example</h3>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-file" aria-hidden="true"></i></span><span class="c-info">Url: https://www.facebook.com/doelmi</span>
                            </div>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span><span class="c-info">Url Encoded: https%3A%2F%2Fwww.facebook.com%2Fdoelmi</span>
                            </div>
                            <div class="c-detail">
                                <span class="c-icon"><i class="fa fa-link" aria-hidden="true"></i></span><span class="c-info">Endpoint: {{ route('short') }}?url=https%3A%2F%2Fwww.facebook.com%2Fdoelmi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-wrap">
                        <h5>Response Example</h5>
                        <pre>
                        <code>
{
    status: "success",
    code: 200,
    message: "Short URL success",
    response_time: "2020-05-19T03:49:06.000000Z",
    result_data: {
        id: 2,
        real_url: "https://www.facebook.com/doelmi",
        shorten_url: "https://s.doelmi.id/f6pBk",
        click_counter: 1,
        shorten_counter: 7
    }
}
                        </code>
                      </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" target="_blank" href="https://www.facebook.com/doelmi">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" target="_blank" href="https://www.twitter.com/doelmi">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white" target="_blank" href="https://www.linkedin.com/in/doelmi">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright © S.DOELMI.ID 2020</p>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loadingModalTitle">Shorting an URL...</h5>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Response -->
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalTitle">Error</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center" id="responseModalText">
                        Error
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
