@include('header')
   <section id="header-slider" class="section text-center not-visible">

                <div class="header-slider-content bg" style="background-image: url('images/pexels-photo-618613.jpeg')">
                    <div class="overlay-black"></div> <!-- Give text context from the image -->
                    <div class="container">
                        <h2 class="section-title" data-slide-animate-effect="slideInUp">
                            <span class="theme-text-color-light">Discover</span> the power of the new internet 
                            <span class="theme-text-color-light">magic money</span> with bitflow
                        </h2>
                        <p class="section-description" data-slide-animate-effect="slideInDown">The secure and easy way to trade bitcoin cryptocurrency</p>
                        <a class="btn btn-theme btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInRight" role="button">Get Started</a>
                        <a class="btn btn-default btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInLeft" role="button">Get BitCoin</a>
                    </div>
                </div> <!-- .header-slider-content## -->

                <div class="header-slider-content bg" style="background-image: url('images/pexels-photo-450271.jpeg')">
                    <div class="overlay-black"></div> <!-- Give text context from the image -->
                    <div class="container">
                        <h2 class="section-title" data-slide-animate-effect="slideInUp">
                            Bitflow has made the trading of <span class="theme-text-color-light">cryto-currency</span> easy and friendly
                        </h2>
                        <p class="section-description" data-slide-animate-effect="slideInDown">The secure and easy way to trade bitcoin cryptocurrency</p>
                        <a class="btn btn-theme btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInRight" role="button">Get Started</a>
                        <a class="btn btn-default btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInLeft" role="button">Get BitCoin</a>
                    </div>
                </div> <!-- .header-slider-content## -->

                <div class="header-slider-content bg" style="background-image: url('images/pexels-photo-541523.jpeg')">
                    <div class="overlay-black"></div> <!-- Give text context from the image -->
                    <div class="container">
                        <h2 class="section-title" data-slide-animate-effect="slideInUp">
                            The secure and <span class="theme-text-color-light">easy platform</span> to trade bitcoin crypto-currency
                        </h2>
                        <p class="section-description" data-slide-animate-effect="slideInDown">The secure and easy way to trade bitcoin cryptocurrency</p>
                        <a class="btn btn-theme btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInRight" role="button">Get Started</a>
                        <a class="btn btn-default btn-lg btn-curved" href="#" data-slide-animate-effect="fadeInLeft" role="button">Get BitCoin</a>
                    </div>
                </div> <!-- .header-slider-content## -->
            </section> <!-- #header-slider -->

        </header> <!-- #masthead -->
<!-- === END HEADER === -->

<!-- === BEGIN CONTENT === -->
        <main class="site-content">
            

            <div class="modal fade" id="sign-up">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Sign up for new accout</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Sign up form -->
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>
                            
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" placeholder="Enter password">
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox">Also sign me in for newsletter</label>
                                </div>

                                <button type="submit" class="btn btn-theme btn-curved btn-block">Sign Up</button>

                                <p class="form-control-static">Already registered? <a href="#" id="log">Sign In</a></p>
                            </form>

                        </div> <!-- .modal-body -->
                    </div> <!-- .modal-content -->
                </div> <!-- .modal-dialog -->
            </div> <!-- #sign-up -->

            <section id="about" class="section text-center">
                <div class="container">
                    <h2 class="section-title">What Is Bitcoin Crypto-Currency</h2>
                    <p class="section-description">Bitcoin is a digital currency that is being used increasingly all over the world since its inception in 2009. 
                        In the years since, many other  and forms of blockchain technology have been developed. 
                        Find out more about bitcoin, ethereum, blockchains, and enterprise distributed ledger technology and how they are 
                        being used and evolving with our straightforward guides.
                    </p>
                </div>                
            </section> <!-- #about -->

            <section id="services" class="section">
                <div class="container">
                    <span class="sr-only">Available Services</span>
                    <div class="row">
                        <ul class="media-list">

                            <li class="col-sm-4" role="presentation">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="fa fa-magic media-object" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Bit Mining</h4>
                                        There are many variations of passages of Lorem Ipsum available, 
                                        but the majority have suffered.
                                    </div>
                                </div>
                            </li>

                            <li class="col-sm-4" role="presentation">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="fa fa-random media-object" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Bit Exchange</h4>
                                        There are many variations of passages of Lorem Ipsum available, 
                                        but the majority have suffered.
                                    </div>
                                </div>
                            </li>

                            <li class="col-sm-4" role="presentation">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="fa fa-bank media-object" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Bit Transaction</h4>
                                        There are many variations of passages of Lorem Ipsum available, 
                                        but the majority have suffered.
                                    </div>
                                </div>
                            </li>
                            <!-- Use bootstrap clearfix in the proper way if you are adding more cols and you are unsure of col heights -->
                        </ul> <!-- .media-list -->
                    </div>
                </div>
            </section> <!-- #services -->

            <section id="setup" class="section bg" style="background-image: url('images/pexels-photo-315788.jpeg');">
                <div class="overlay-black"></div>
                <div class="cover-half hidden-xs"></div>
                <div class="container">
                    <div class="row">
                        <ol class="media-list col-sm-6">
                            <h2 class="section-title" data-scroll-animate="fadeIn">Steps to start trading bitCoin</h2>
                            <li class="media" data-scroll-animate="fadeInUp">
                                <div class="media-left">
                                    <div class="media-object">1</div>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Download a Wallet</a></h3>
                                    Download an app or program Bitcoin Wallet which allows you to send and receive bitcoins.
                                </div>
                            </li> <!-- .media.. -->
                            
                            <li class="media" data-scroll-animate="fadeInUp">
                                <div class="media-left">
                                    <div class="media-object">2</div>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Add Bitcoin to the Wallet</a></h3>
                                    Once your wallet is downloaded, sign in and activate it by adding some bitcoins via credit card.
                                </div>
                            </li> <!-- .media.. -->
                            
                            <li class="media" data-scroll-animate="fadeInUp">
                                <div class="media-left">
                                    <div class="media-object">3</div>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Send or Receive with Wallet</a></h3>
                                    Once you've activated your wallet you can now send or recieve bitcions, anytime and anyday.
                                </div>
                            </li> <!-- .media.. --> 
                        </ol>


                    </div>
                </div>
            </section> <!-- #setup -->
<center><h1><span class="theme-text-color-dark">Trading</span> Plans</h1></center><br/>
            <section id="prices" class="section text-center">
                <div class="container">
                   
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                       
                        <!-- Tab panels - Make sure to update IDs of this panels if you've made changes to the the Nav Tabs above. -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="usd">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount"><strong>1st Range</strong></div>
                                                Below $100<br class="margin-bottom-20">
                                                <div class="amount"><strong class="theme-text-color-dark">Capital Lock:</strong> 7 Days</div>
                                                <div class="amount"><strong class="theme-text-color-dark">Daily Interest:</strong> upto &nbsp; 1%</div>
                                                <a class="btn btn-theme" href="/signup" role="button">sign-up</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount"><strong>2nd Range</strong></div>
                                                $100 - 500<br class="margin-bottom-20">
                                                <div class="amount"><strong class="theme-text-color-dark">Capital Lock:</strong> 30 Days</div>
                                                <div class="amount"><strong class="theme-text-color-dark">Daily Interest:</strong> upto 1.5%</div>
                                                <a class="btn btn-theme" href="/signup" role="button">sign-up</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount"><strong>3rd Range</strong></div>
                                                $500 - 1000<br class="margin-bottom-20">
                                                <div class="amount"><strong class="theme-text-color-dark">Capital Lock:</strong> 60 Days</div>
                                                <div class="amount"><strong class="theme-text-color-dark">Daily Interest:</strong> upto &nbsp; 2%</div>
                                                <a class="btn btn-theme" href="/signup" role="button">sign-up</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount"><strong>4th Range</strong></div>
                                                Above $1000<br class="margin-bottom-20">
                                                <div class="amount"><strong class="theme-text-color-dark">Capital Lock:</strong> 90 Days</div>
                                                <div class="amount"><strong class="theme-text-color-dark">Daily Interest:</strong> upto 2.5%</div>
                                                
                                                <a class="btn btn-theme" href="/signup" role="button">sign-up</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- #usd -->

                            <div role="tabpanel" class="tab-pane fade" id="eur">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">€70</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00799 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">€150</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.01021 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">€450</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.05421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">€950</div>
                                                
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- #eur -->

                            <div role="tabpanel" class="tab-pane fade" id="gbp">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">$210</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00799 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">£310</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.01021 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">£640</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.05421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">£1040</div>
                                                
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- #gbp -->

                            <div role="tabpanel" class="tab-pane fade" id="jpy">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">¥160</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.00799 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">¥260</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.01021 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">¥580</div>
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="panel amount-card">
                                            <div class="panel-body">
                                                <div class="bit-amount">Get 0.05421 BTC</div>
                                                AT<br class="margin-bottom-20">
                                                <div class="amount">¥1080</div>
                                                
                                                <a class="btn btn-theme" href="#" role="button">Get It</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- #jpy -->

                           
                            <div id="other-price" class="collapse">

                                <form class="form-inline margin-vert-30" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="custom-price">Custom Price</label>
                                        <input type="number" name="" id="custom-price" class="form-control" value="0.00421" min="0.00421" max="" step="0.00001" required="required" title="">     
                                    </div>
                                
                                    <button type="submit" class="btn btn-default">Get It</button>
                                </form>
                                                            
                            </div> <!-- #other-price -->

                        </div> <!-- .tab-content -->
                    </div> <!-- tabpanel -->
                </div>
            </section> <!-- #prices -->
			  
         <center><h1><span class="theme-text-color-dark">Trade &nbsp;</span>Volumes</h1></center><br/>
            <section id="numbers" class="bg section" style="background-image: url('images/pexels-photo-730564.jpeg');">
                <div class="overlay-black"></div> <!-- Used for a see through background and also maintain text visiblity -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 number" data-scroll-animate="fadeIn">
                            <i class="fa fa-globe margin-bottom-10" aria-hidden="true"></i>
                            <div class="counter">
                                <span class="count" data-from="0" data-to="35" data-speed="5000" data-refresh-interval="50">35</span>
                                <span>+</span>
                            </div>
                            <div>Contries</div>
                        </div> <!-- .number## -->

                        <div class="col-sm-3 number" data-scroll-animate="fadeIn">
                            <i class="fa fa-bitcoin margin-bottom-10" aria-hidden="true"></i>
                            <div class="counter">
                                <span class="count" data-from="100" data-to="25325.55" data-speed="4000" data-decimals="2" data-refresh-interval="50">100</span>
                                <span>+</span>
                            </div>
                            <div>BitCoins</div>
                        </div> <!-- .number## -->

                        <div class="col-sm-3 number" data-scroll-animate="fadeIn">
                            <i class="fa fa-heart margin-bottom-10" aria-hidden="true"></i>
                            <div class="counter">
                                <span class="count" data-from="1000" data-to="50250" data-speed="4000" data-refresh-interval="50">1000</span>
                                <span>+</span>
                            </div>
                            <div>Investors</div>
                        </div>

                        <div class="col-sm-3 number" data-scroll-animate="fadeIn">
                            <i class="fa fa-cubes margin-bottom-10" aria-hidden="true"></i>
                            <div class="counter">
                                <span class="count" data-from="0" data-to="8" data-speed="5000" data-refresh-interval="50">8</span>
                                <span>+</span>
                            </div>
                            <div>Years</div>
                        </div> <!-- .number## -->
                    </div>
                </div>
            </section> <!-- #numbers --><br/>

      
<div class="ab_info" id="trading">
    <div class="container">
        <div class="tittle_head_w3layouts">
            <h3 class="tittle">Trading <span>Summary</span><br/></h3>
        </div>
        <br/>
        @include('trading_data/index')
    </div>
</div><br/>
          
         <center><h1><span class="theme-text-color-dark">Affiliate</span>Bonus</h1></center><br/>

            <section id="features" class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <img src="images/pexels-photo-776615.jpeg" alt="BitFlow Team">
                            </div>
                        </div>
                        <div class="col-sm-6 article">
                            <h2 class="h3"><span class="theme-text-color-dark">Earn 5% Affiliate bonus</span> Affiliate bonus.</h2>
                            <p>At Crypto Range, we believe in rewarding our team for the hard-work they do. For every referral you make on Crypto Range, you get a 5% Affiliate Bonus of their sign-up value.<br/>
							We value your relationship with us and that's why we help you build a better network of investment partners. Affiliate bonus is provided for every referral that signs up with Crypto Range upon their successful on-boarding and would reflect as your investment partners in Crypto Range.
                            </p>  
                            
                        </div>
                    </div>
                </div>
            </section> <br/><!-- #philosophy -->

            
        </main> <!-- .site-content -->
<!-- === END CONTENT === -->
@include('footer')