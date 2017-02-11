<!DOCTYPE html>
<?php
 require('auth.php');

 if(!authen())
header("Location:login.php");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Revival </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="background-image:url(img/intro-bg.jpg)" >

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> Revival<span class="light"> : Find Your Perfect Organ Match</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading" style="color:red">MATCH FINDER</h1>
                        <p class="intro-text" style="color:red">A free, responsive and quick donar locator.
						<br><br>
                        <a href="#about" class="btn btn-circle page-scroll" style="color:red" >
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
<br><br><br>


<h2 align="center" style="color:black"><t>   We have shortlisted the perfect donars for you</t></h2>

<?php
require('cc.php');
	$pdo=connect();
	$q="Select R_BloodGroup from recipient_details where R_ID='".$_SESSION['id']."'";
	$r=runqueryrow($pdo,$q);
	
	if($r['R_BloodGroup']=='AB+')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','O+','B-','B+','A-','A+','AB-')";
	else if($r['R_BloodGroup']=='AB-')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','B-','A-','AB-','AB+')";
	else if($r['R_BloodGroup']=='A+')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','O+','A-','A+')";
	else if($r['R_BloodGroup']=='A-')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','A-')";
	else if($r['R_BloodGroup']=='B+')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','O+','B-','B+')";
	else if($r['R_BloodGroup']=='B-')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','B-')";
	else if($r['R_BloodGroup']=='O+')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-','O+')";
	else if($r['R_BloodGroup']=='O-')
		$q="select D_Name,D_BloodGroup ,D_PhoneNo from donor_details where D_BloodGroup in ('O-')";
	
	$res=runqueryall($pdo,$q);
	if($res)
	{	
		foreach($res as $r)
	echo '<h3 align="center" style="color:black"><br> Name:'.$r['D_Name'].'</h3>';	
	echo '<h4 align="center" style="color:black"> Mobile no.:'.$r['D_PhoneNo'].'</h4>'; 
	echo '<h4 align="center" style="color:black"> '.$r['D_Organ'].'</h4>';
	}

		
</body>

</html>
