<?php
$team = [
    1 => [
        'name' => 'Will Grund',
        'role' => 'Software Engineer',
        'image' => 'assets\images\profile.jpg',
        'dob' =>  '2002-06-27'
    ],
    2 => [
        'name' => 'Master Chief',
        'role' => 'Spartan',
        'image' => 'assets\images\halo_3_DMBwcnr.webp',
        'dob' =>  '2511-03-07'
    ],
	3 => [
        'name' => 'Beeg Yoshi',
        'role' => 'Yoshi',
        'image' => 'assets\images\Beeg_Yoshi.webp',
        'dob' =>  '2019-01-26'
    ],
];

function calculateAge($dateOfBirth) {
    $dob = new DateTime($dateOfBirth);
    $currentDate = new DateTime();
    $ageInterval = $currentDate->diff($dob);
    if ($currentDate < $dob) {
        return -$ageInterval->y;
    } else {
        return $ageInterval->y;
    }
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Our amazing team</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your name's resume">
    <meta name="author" content="Your name">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    
    <!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>
       
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/pillar-1.css">


</head> 

<body>
    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
			<h1 class="py-4 text-center">OUR AMAZING TEAM</h1>
		    <?php
            foreach ($team as $id => $member) {
                include 'template.php';
                $template = str_replace('Member name', $team[$id]['name'], $template);
                $template = str_replace('Member role', $team[$id]['role'], $template);
                $template = str_replace('assets/images/profile.jpg', $team[$id]['image'], $template);
                $template = str_replace('Age', calculateAge($team[$id]['dob']), $template);

                $detailPageURL = "detail.php?id=$id";
                $template = str_replace("LINK_TO_MEMBER_PAGE", $detailPageURL, $template);

                echo $template;
}
?>

		    
	    </div>
    </article> 

    
    <footer class="footer text-center pt-2 pb-5">
	    <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"></i> by Your names</small>
    </footer>

    

</body>
</html> 

