<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer -->
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <figure class="image-logo">
                                    <img src="{{ asset(@$footerInformation->logo) }}" alt="" class="logo-footer">
                                </figure>
                                <p>{{ @$footerInformation->description }}</p>
                                <div class="social__media mt-4">
                                    <ul class="list-inline">
                                        @foreach ($socialLinks as $socialLink)
                                        <li class="list-inline-item">
                                            <a href="{{ $socialLink->url }}" class="btn btn-social rounded text-white facebook">
                                                <i class="{{ $socialLink->icon }}"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        entertainment
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="#">celebity news</a>
                                    </li>
                                    <li>
                                        <a href="#">movies</a>
                                    </li>
                                    <li>
                                        <a href="#">tv news</a>
                                    </li>
                                    <li>
                                        <a href="#">music news</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">entertainment video</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        health
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="#">medical research</a>
                                    </li>
                                    <li>
                                        <a href="#">healthy living</a>
                                    </li>
                                    <li>
                                        <a href="#">mental health</a>
                                    </li>
                                    <li>
                                        <a href="#">virus corona</a>
                                    </li>
                                    <li>
                                        <a href="#">children's health</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        business
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="#">merkets</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">features</a>
                                    </li>
                                    <li>
                                        <a href="#">property</a>
                                    </li>
                                    <li>
                                        <a href="#">business leaders</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">{{ @$footerInformation->copyright }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
