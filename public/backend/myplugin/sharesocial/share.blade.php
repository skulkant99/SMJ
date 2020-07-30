<!DOCTYPE html>
<html lang="en">
<head>
	<link href="{{asset('manage/sharesocial/social-share-kit.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<a class="ssk ssk-facebook"></a>
  
<script type="text/javascript" src="{{asset('manage/sharesocial/social-share-kit.js')}}"></script>
<script type="text/javascript">

    // Init Social Share Kit
    SocialShareKit.init({
        url: 'https://www.facebook.com/benz.sk.7509',
        facebook: {
            title: 'Social Share Kit',
            via: 'socialsharekit'
        },
    });
</script>