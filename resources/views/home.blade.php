<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Short URL at S.DOELMI.ID - Super Free URL Shorting and API Support">
    <meta name="author" content="Abdullah Fahmi">
    <link rel="icon" type="image/png" href="{{ url('images/favicon-32x32.png?v=' . $version) }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('images/favicon-16x16.png?v=' . $version) }}" sizes="16x16" />
    <title>Short URL at S.DOELMI.ID</title>
    <!--stylesheet-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('styles/styles.css?v=' . $version) }}" rel="stylesheet" type="text/css">
    <link href="{{ url('styles/custom-responsive-styles.css?v=' . $version) }}" rel="stylesheet" type="text/css">
    <!--scripts-->
    <script type="text/javascript" src="{{ url('scripts/jquery-3.2.1.min.js?v=' . $version) }}"></script>
    <script type="text/javascript" src="{{ url('scripts/all-plugins.js?v=' . $version) }}"></script>
    <script type="text/javascript" src="{{ url('scripts/plugins-activate.js?v=' . $version) }}"></script>
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
                <div class="row justify-content-center mb-3">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" name="short_an_url" placeholder="Short an URL" aria-label="Short an URL" aria-describedby="button-short" required autocomplete="off">
                            <input type="hidden" name="uuidv4" value="{{$uuidv4}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-xl" type="submit" id="button-short">SHORT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="custom_code" placeholder="Custom Code" autocomplete="off">
                        </div>
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
                    <p class="lead" id="real_url" style="overflow: auto;white-space: nowrap;padding: 0.5rem;">{url}</p>
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
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <div class="contact-wrapper">
                        <div class="address-block">
                            <h5 class="mb-4">Setting</h5>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h6>URL</h6>
                                    <hr>
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="text-success m-0">GET</span> <span class="text-dark m-0">{{ route('short') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <h6>Parameters</h6>
                                    <hr>
                                    <div class="row mb-2">
                                        <div class="col-xs-12 col-md-3">
                                            <span class="m-0 font-weight-bold">url</span>
                                        </div>
                                        <div class="col-xs-12 col-md-9">
                                            <p>
                                                <span class="text-danger m-0" style="line-height: 0%;">Required</span>
                                                <span class="m-0 text-justify" style="line-height: 0%;">
                                                    The URL will be shorten. If you are using PHP please use urlencode() function. If JavaScript use encodeURIComponent(). If other language, please use function look a like.
                                                </span>
                                            </p>
                                            <p>
                                                <span class="badge badge-info text-white m-0" style="font-size: 11px; line-height: 100%;">Example</span>
                                                <span class="m-0 text-dark" style="line-height: 0%;">{{$urlencoded}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-xs-12 col-md-3">
                                            <span class="m-0 font-weight-bold">token</span>
                                        </div>
                                        <div class="col-xs-12 col-md-9">
                                            <p>
                                                <span class="text-warning m-0" style="line-height: 0%;">Optional</span>
                                                <span class="m-0 text-justify" style="line-height: 0%;">Unique identifier. Structured as UUIDv4. You can generate UUIDv4 via <a href="{{$generatorUrl}}" target="_blank">UUID Generator</a>. (In future) You can get report by this token.</span>
                                            </p>
                                            <p>
                                                <span class="badge badge-info text-white m-0" style="font-size: 11px; line-height: 100%;">Example</span>
                                                <span class="m-0 text-dark" style="line-height: 0%;">{{$uuidv4}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-xs-12 col-md-3">
                                            <span class="m-0 font-weight-bold">custom_code</span>
                                        </div>
                                        <div class="col-xs-12 col-md-9">
                                            <p>
                                                <span class="text-warning m-0" style="line-height: 0%;">Optional</span>
                                                <span class="m-0 text-justify" style="line-height: 0%;">Unique custom string. You can make code as you want. Shorten URL will be {{url($customCode)}}</span>
                                            </p>
                                            <p>
                                                <span class="badge badge-info text-white m-0" style="font-size: 11px; line-height: 100%;">Example</span>
                                                <span class="m-0 text-dark" style="line-height: 0%;">{{$customCode}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <div class="contact-wrapper m-0 p-0" style="border: 0;">
                        <div class="address-block">
                            <h5 class="mb-4">Example</h5>
                            <div class="mb-4">
                                <h6>Example URL</h6>
                                <hr>
                                <div class="card">
                                    <div class="card-header">
                                        <span class="text-success m-0">GET</span> <span class="text-dark m-0">{{ route('short') }}?url={{$urlencoded}}&token={{$uuidv4}}</span>
                                    </div>
                                    <div class="card-body">
                                        <span class="m-0 text-dark">Click <a href="{{ route('short') }}?url={{$urlencoded}}&token={{$uuidv4}}" target="_blank" class="badge badge-dark m-0">here</a> to open (new tab)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6>JSON Structure Response</h6>
                                <hr>
                                <iframe style="border: 0; width: 100%; height: 287px;" src="{{$urlCodeExample}}" title="Response Example"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="mb-3">
                <a class="btn btn-primary" target="_blank" href="https://tip.doelmi.id">
                    <i class="fa fa-heart mr-1" aria-hidden="true"></i>
                    Donate via D'Tip (My own site)
                </a>
            </div>
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
                    <a class="social-link rounded-circle text-white mr-3" target="_blank" href="https://www.instagram.com/doelmi">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" target="_blank" href="https://www.linkedin.com/in/doelmi">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright © S.DOELMI.ID 2020</p>
            <p class="text-muted small mb-0">Version {{$version}}</p>
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
