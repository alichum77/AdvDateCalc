<!DOCTYPE html>
<html class=" js csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><!-- <script src="indexfiles/user_timeline.json" async=""></script> -->
        <meta charset="utf-8">
        <title>Date Calculator & Events Calender</title>

        <link rel="shortcut icon" href="http://uexel.us/themes/serenity/narrow/favicon.png" type="image/x-icon">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

  

        <!-- Stylesheet /--> 
        <link rel="stylesheet" href="indexfiles/bootstrap.css">
        <link rel="stylesheet" href="indexfiles/font-awesome.css">
        <link rel="stylesheet" href="indexfiles/style.css">
        <link rel="stylesheet" href="indexfiles/style-responsive.css">
        <script src="indexfiles/jquery.min.js"></script>
        <script src="indexfiles/my.js"></script>
        <script src="indexfiles/script.js"></script>
        <link rel="stylesheet" type="text/css" href="indexfiles/jquery.css" media="all">
        <script type="text/javascript">
		$(document).ready(function()
		{
			$(".subbtn").click(function()
			{
			
				var data  = "Gregorian="+document.getElementById('Gregorian').value;  
				            data += "&mmonth="+document.getElementById('mmonth').value;
				            data += "&mday="+document.getElementById('mday').value;
				            data += "&Islamic="+document.getElementById('Islamic').value;
				            data += "&imonth="+document.getElementById('imonth').value;
				            data += "&iday="+document.getElementById('iday').value;
				            data += "&Persian="+document.getElementById('Persian').value;
				            data += "&smonth="+document.getElementById('smonth').value;
				            data += "&sday="+document.getElementById('sday').value;
				     
				$.ajax
				({
					type: "POST",
					url: "calen/index.php",
					data: data,
					cache: false,
					success: function(html)
					{
						$("#saveResult").html(html);
					} 
				});
				
			});
			
		});
</script>


    </head>
    <body>
        <!-- HEADER HOME  -->
        <section id="home">
            <div class="row centered">

                <h1 class="fade-it"><img  src="indexfiles/logo_header.png"></h1>
                <div class="flexslider">
                    <ul class="slides">
                        <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
                            <h2>Add &amp; View Events</h2>
                            <!--  
                            <h2>
                                <i class="icon-desktop"></i>
                                <i class="icon-tablet"></i>
                                <i class="icon-mobile-phone"></i>
                            </h2>
                            -->
                        </li>
                        <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;"><h2>Calculate Dates...</h2></li>
                        <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;"><h2>... convert dates</h2></li>
                    </ul>
                </div>
            </div>

            <!-- LITTLE LOGO SEE WHAT WE DO --> 
            <div id="down_button" class="fade-it"><a href="#whatwedo"></a></div>
            <!-- 
            <div class="social-header hidden-phone">

                <a href="#" class="social-network sn2 behance"></a>
                <a href="#" class="social-network sn2 facebook"></a>
                <a href="#" class="social-network sn2 pinterest"></a>
                <a href="#" class="social-network sn2 flickr"></a>
                <a href="#" class="social-network sn2 dribbble"></a>
                <a href="#" class="social-network sn2 lastfm"></a>
                <a href="#" class="social-network sn2 forrst"></a>
                <a href="#" class="social-network sn2 xing"></a>   


            </div>
             -->
            <!-- END LITTLE LOGO SEE WHAT WE DO --> 

        </section>
        <!-- END HEADER HOME  -->
        <!-- NAVIGATION  -->

        <div style="height: 60px;" class="navbar-wrapper">
            <div style="top: 0px;" class="navbar navbar-fixed-top" id="navigation">
                <div class="navbar-inner">
                    <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="">  <img src="indexfiles/logo_small.png"></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href="#home" class="">Home</a></li>
                            <li><a class="selected" href="#whatwedo">Date Calculator</a></li>
                            <li><a class="" href="#services">what we Do</a></li>
                            <li><a class="" href="#about">who we are</a></li>
                            <li><a class="" href="#contact">Contact</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--</div>-->
        <!-- END NAVIGATION  --><!-- WHAT WE DO SECTION  -->




        <section id="whatwedo">
            <div class="container">
                <div class="row">
                    <div class="span4 centered">
                        <h2>Date Calculator</h2>
                        <div class="breaker"><span class="left"></span><div class="feather"></div><span class="right"></span></div>
                    </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                    <div id="accordionTable1" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseTable1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle btn btn-info" style="text-align: left;text-decoration: none">
                                    <i class="icon-list-alt"></i> Perfect Date Calculator <i class="icon-minus pull-right"></i>
                                </a>
                            </div>
                            <div class="accordion-body in collapse" id="collapseTable1" style="height: auto;">
                                <div style="background-color: #ffffff;" class="accordion-inner">
                                    <form action="" name="frm" id="frm" method="POST" >
									<table class="rounded-box table">
									<thead>
									
									<tr><td></td><td>Year</td><td>Month</td><td>Day</td></tr></thead>
									<tbody>
									<tr>
									
									<td>Gregorian</td><td><input type="text" name="Gregorian" size="10" id="Gregorian" value="" onblur="enables(this)" onkeyup="enableAll()" /></td>
									
									
									<td><select name="mmonth" id="mmonth" onchange="enmonth(this)">
									<option ></option><option >Jan</option><option  >Feb</option><option>Mar</option><option>
									Apr</option><option>May</option><option>Jun</option><option>Jul</option>
									<option >Aug</option><option>Sep</option><option>Oct</option>
									<option >Nov</option><option>Dec</option></select>
									</td>
									
									<td>  <select name="mday" id="mday" onchange="enday(this)">
									
									<option ></option><option >1</option><option  >2</option><option>3</option><option>
									4</option><option>5</option><option>6</option><option>7</option>
									<option >8</option><option>9</option><option>10</option>
									<option >11</option><option>12</option>
									<option >13</option><option  >14</option><option>15</option><option>
									16</option><option>17</option><option>18</option><option>19</option>
									<option >20</option><option>21</option><option>22</option>
									<option >23</option><option>24</option>
									<option>25</option><option>26</option>
									<option >27</option><option>28</option>
									<option>29</option><option>30</option>
									<option >31</option>
									
									
									
									</select>
									</td>
									</tr>
									<tr>
									<td>Islamic</td><td><input type="text" name="Islamic" id="Islamic" value="" onblur="enables(this)" onkeyup="enableAll()" /> </td>
									<td><select name="imonth" id="imonth" onchange="enmonth(this)" >
									<option ></option><option >محرم</option><option  >صفر</option><option>ربيع الاول</option><option>
									ربيع الثاني</option><option>جمادى الاولى</option><option>جمادي الثانية</option><option>رجب</option>
									<option >شعبان</option><option>رمضان</option><option>شوال</option>
									<option >ذوالقعدة</option><option>ذوالحجة</option></select>  
									</td>
									<td>
									<select name="iday" id="iday" onchange="enday(this)" >
									<option ></option><option >1</option><option  >2</option><option>3</option><option>
									4</option><option>5</option><option>6</option><option>7</option>
									<option >8</option><option>9</option><option>10</option>
									<option >11</option><option>12</option>
									<option >13</option><option  >14</option><option>15</option><option>
									16</option><option>17</option><option>18</option><option>19</option>
									<option >20</option><option>21</option><option>22</option>
									<option >23</option><option>24</option>
									<option>25</option><option>26</option>
									<option >27</option><option>28</option>
									<option>29</option><option>30</option>
									<option >31</option>
									
									
									</select>   </td>
									</tr>
									<tr>
									<td>Shamsi</td><td><input type="text" name="Persian" id="Persian" value="" onblur="enables(this)" onkeyup="enableAll()" /></td>
									<td ><select name="smonth" id="smonth" onchange="enmonth(this)">
									<option ></option><option >حمل</option><option  >ثور</option><option>جوزا</option><option>
									سرطان</option><option>اسد</option><option>سنبله</option><option>ميزان</option>
									<option >عقرب</option><option>قوس</option><option>جدي</option>
									<option >دلو</option><option>حوت</option></select>
									</td><td><select name="sday" id="sday" onchange="enday(this)">
									<option ></option><option >1</option><option  >2</option><option>3</option><option>
									4</option><option>5</option><option>6</option><option>7</option>
									<option >8</option><option>9</option><option>10</option>
									<option >11</option><option>12</option>
									<option >13</option><option  >14</option><option>15</option><option>
									16</option><option>17</option><option>18</option><option>19</option>
									<option >20</option><option>21</option><option>22</option>
									<option >23</option><option>24</option>
									<option>25</option><option>26</option>
									<option >27</option><option>28</option>
									<option>29</option><option>30</option>
									<option >31</option>
									
									
									</select>  
									</td>
									</tr>
									
									<tr  ><td align="center" colspan="4" >
									<input class="btn btn-large btn-info span12 subbtn" type="button"  name="subbtn" id="subbtn" align="Center" value="Calculate" />
									</td></tr> 
									</tbody>                                                         
									</table>
									</form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                            </div>
                    </div>
                </div>
            </div>
            
            <div id="saveResult">
            
            </div>
        </section>
        <!-- END WHAT WE DO SECTION  -->

        <!-- SERVICES SECTION  -->

        <section id="services">

            <div class="container">
                <div class="row">
                    <div class="span12 centered">
                        <h2>what we do</h2>
                        <div class="breaker"><span class="left"></span><div class="feather"></div><span class="right"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="span12 centered">
                        <p class="subtittle">our areas of expertise<br>the best we can offer </p>
                    </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <div class="box">
                            <div class="box_icon">
                                <i class="icon-code icon-3x"></i>
                            </div>
                            <h6><strong>Programming</strong></h6>
                            <p>
                                
                            </p>

                        </div>
                    </div>
                    <div class="span3">
                        <div class="box">
                            <div class="box_icon">
                                <i class="icon-pencil icon-3x"></i>
                            </div>
                            <h6><strong>Design</strong></h6>
                            <p>
                               
                            </p>

                        </div>
                    </div>
                    <div class="span3">
                        <div class="box">
                            <div class="box_icon">
                                <i class="icon-keyboard icon-3x"></i>
                            </div>
                            <h6><strong>Development</strong></h6>
                            <p>
                                
                            </p>

                        </div>
                    </div>
                    <div class="span3">
                        <div class="box">
                            <div class="box_icon">
                                <i class="icon-camera icon-3x"></i>
                            </div>
                            <h6><strong>Research</strong></h6>
                            <p>
                                
                            </p>

                        </div>
                    </div>

                </div>




            </div>


        </section>        
        <!-- END SERVICES  -->
        <!-- WHO ARE US SECTION  -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="span12 centered">
                        <h2>who we are</h2>
                        <div class="breaker"><span class="left"></span><div class="feather"></div><span class="right"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="span12 centered">
                        <p class="subtittle">WE BRING A PERSONAL AND EFFECTIVE APPROACH<br> TO EVERY PROJECT WE WORK ON</p>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                        <div class="team">
                            <img alt="altname" src="indexfiles/male2.jpg">
                            <span class="name">Ali Sajjad </span><br>
                            <span class="position">Founder</span><br>
                            <span class="social">
                                <a href="#" class="social-network facebook"></a>
                                <a href="#" class="social-network skype"></a>
                                <a href="#" class="social-network twitter"></a>

                            </span> 
                        </div>
                    </div>
                    <div class="span3">
                        <div class="team">
                            <img alt="altname" src="indexfiles/male1.jpg">
                            <span class="name">Mohammad Parwiz</span><br>
                            <span class="position">Advisor</span><br>
                            <span class="social">
                                <a href="#" class="social-network facebook"></a>
                                <a href="#" class="social-network skype"></a>
                                <a href="#" class="social-network twitter"></a>

                            </span> 
                        </div>
                    </div>
                    <div class="span3">
                        <div class="team">
                            <img alt="altname" src="indexfiles/male2.jpg">
                            <span class="name">Zainul Abedin</span><br>
                            <span class="position">Member</span><br>
                            <span class="social">
                                <a href="#" class="social-network facebook"></a>
                                <a href="#" class="social-network skype"></a>
                                <a href="#" class="social-network twitter"></a>

                            </span> 
                        </div>
                    </div>
                    <div class="span3">
                        <div class="team">
                            <img alt="altname" src="indexfiles/male1.jpg">
                            <span class="name">Mohammad Behroz</span><br>
                            <span class="position">Member</span><br>
                            <span class="social">
                                <a href="#" class="social-network facebook"></a>
                                <a href="#" class="social-network skype"></a>
                                <a href="#" class="social-network twitter"></a>

                            </span> 
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- END WHO ARE US SECTION  -->

        <!-- CONTACT SECTION  -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="span12 centered">
                        <h2>say hello</h2>
                        <div class="breaker">
                            <span class="left"></span>
                            <div class="feather"></div>
                            <span class="right"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="span12 centered">
                        <p class="subtittle">We can help you <strong>promote</strong> your business.<br> Think we might help? We'd love to hear from you.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="span7">
                        <form name="" method="post" action=""> 
                            <input name="first_name" placeholder="YOUR NAME" type="text"> 
                            <input name="email" placeholder="YOUR E-MAIL" type="email"> 
                            <textarea name="comments" cols="1" rows="5" placeholder="YOUR MESSAGE"></textarea>
                            <button name="send" type="submit" class="button">Take a Leap</button>
                        </form>
                    </div>
                    <div class="span5">
                        <div class="info">
                            <p class="contactAddress">Afshar Selo, Kabul <br>Afghanistan
                                <br><a class="fancybox-media fancybox.iframe" href="http://maps.google.com/maps?q=Afshar,+Kabul,+Afghanistan&hl=en&ll=34.535798,69.108939&spn=0.020646,0.038581&sll=37.0625,-95.677068&sspn=40.545434,79.013672&oq=afshar+kabul&hnear=Afshar,+Kabul,+Afghanistan&t=m&z=15&iwloc=A">View Map</a></p>
                        </div>
                        <div class="info">
                            <p class="contactPhone">Phone: (0093) 77 5142 852</p>
                            <p class="contactEmail">Email: <a href="#">ali.chum7@gmail.com</a></p>
                            <p class="contactSkype">Skype: <a href="#">ali.sajjad70</a></p>
                        </div>
                        <div class="info">
                            <p class="contactTime">
                                Sat-Wed: 9:00am ‚ 5:00pm <br>
                                
                                Friday: Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT SECTION  -->
        <!-- TWITTER MODULE  --> 
        <!-- 
        <section id="twitter_module">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="ticker" class="query"><p class="loading">loading tweets...</p></div>
                    </div>
                </div>
            </div>
        </section>
         -->
        <!-- END TWITTER MODULE  -->

        <!-- FOOTER  -->
        <footer>

            <!-- SOCIAL MODULE  --> 
            <!-- 
            <section id="social_module">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul>
                                <li><a href="#" target="_blank"><i class="icon icon-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icon icon-linkedin"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icon icon-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icon icon-pinterest"></i></a></li>
                                <li><a href="#" target="_blank"><i class="icon icon-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
             -->
            <!-- END SOCIAL MODULE  -->

            <!-- COPYRIGHT  -->
            <div class="container">
                <div class="row">
                    <div class="span6 center">
                        <img alt="My Logo" src="indexfiles/logo_footer.png">


                    </div>
                    <div class="span6">
                        <p class="copyright text-right center">
                            <a href="#home">Home</a> | <a href="#about">About</a> | <a href="#">Privacy Policy</a>
                        </p>
                        <p class="copyright text-right center">© 2013 Ali Sajjad </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER  --> 

        <!-- JAVA SCRIPTS  --> 
        
        <script src="indexfiles/jquery-1.js" type="text/javascript"></script>
        <script src="indexfiles/modernizr.js" type="text/javascript"></script> 
        <script src="indexfiles/jquery.js"></script>
        <script src="indexfiles/waypoints.js" type="text/javascript"></script>
        <script src="indexfiles/jquery_004.js" type="text/javascript"></script>
        <script src="indexfiles/custom.js" type="text/javascript"></script>
        <script src="indexfiles/bootstrap.js"></script>
        <script src="indexfiles/jquery_003.js"></script>
        <script src="indexfiles/jquery_005.js" type="text/javascript"></script>
        <script src="indexfiles/jquery_002.js" type="text/javascript"></script>
         <script src="indexfiles/retina.js"></script>

     
    
</body></html>