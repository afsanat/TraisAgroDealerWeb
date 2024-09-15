<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['search'])) {
        $agroDealerID = $_POST['searchID'];
        
        // Fetch agro-dealer details from the database
        $sql = "SELECT * FROM agro_dealers WHERE agro_dealer_id = :agroDealerID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':agroDealerID', $agroDealerID, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['update'])) {
        $agroDealerID = $_POST['agroDealerID'];
        $fullName = $_POST['fullName'];
        $businessName = $_POST['businessName'];
        // Update other fields similarly

        // Update agro-dealer details in the database
        $sql = "UPDATE agro_dealers SET 
                    full_name = :fullName, 
                    business_name = :businessName
                    -- Add other fields here
                WHERE agro_dealer_id = :agroDealerID";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':agroDealerID', $agroDealerID, PDO::PARAM_STR);
        $query->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $query->bindParam(':businessName', $businessName, PDO::PARAM_STR);
        // Bind other fields similarly

        $query->execute();
        
        if($query) {
            $msg = "Smallholder Farmer updated successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Smallholder Farmers</title>
<meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-2.1.4.min.js"></script>
</head> 
<body onload='init()'>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php include('includes/header.php'); ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Smallholder Farmer</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Smallholder Farmer</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <!-- Search Form -->
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="searchID">Search Farmer by ID</label><input type="text" name="searchID" class="form-control" required></td>
                                    <td><br><button type="submit" name="search" class="btn btn-primary"> Click to Search </button></td>
                                </tr>
                            </table>
                        </form>
                        
                        <?php if(isset($result)) { ?>
                        <!-- Update Form -->
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="agroDealerID">Farmer ID</label><input type="text" name="agroDealerID" value="<?php echo htmlentities($result['agro_dealer_id']); ?>" class="form-control" readonly></td>
                                    <td><label for="fullName">Full Name</label><input type="text" name="fullName" value="<?php echo htmlentities($result['full_name']); ?>" class="form-control" required></td>
                                    <td><label for="businessName">Farming Type</label><input type="text" name="businessName" value="<?php echo htmlentities($result['business_name']); ?>" class="form-control" required></td>
                                    <td><img id="image" src="images/trais.jpg" alt="TRAIS" /></td>
                                </tr>
                                <tr>
                                    <td><label for="LandSize">Land Size (hectares)</label><input type="number" step="0.01" name="LandSize" class="form-control" value="4" required></td>
                                    <td><label for="CropType">Crop Type</label><input type="text" name="CropType" class="form-control" value="Crops/Grains Farming" required></td>
                                    <td><label for="farmer_vul">Social Vulnerability</label>
                                        <select name="farmer_vul" class="form-control" required>
                                            <option value="Yes" >Female Headed Family</option>
                                            <option value="No" > widower</option>
                                            <option value="Yes" >Disability</option>
                                            <option value="No" > Female-headed households</option>
                                        </select>
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td colspan="3"><br><button type="submit" name="update" class="btn btn-primary">Update Farmer</button></td>

                                    <td colspan="3"><br><button type="button" onclick="startAnimation()" class="btn btn-primary"> Authenticate </button></td>
                                    <td><img id="image" src="images/esignet.jpg" alt="Authenticate" /></td>
                                </tr>


                            </table>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/sidebarmenu.php'); ?>
</div>

<!-- Moved JavaScript block down -->
<script type="text/javascript">
    var initImage = ['images/auth_sucess.jpg', 'images/mosip_auth.png'];
    var imgList = [
        'images/s1.png', 'images/s2.png', 'images/s3.png', 
        'images/s4.png', 'images/s5.png', 'images/s6.png', 
        'images/s7.png', 'images/s8.png', 'images/s9.png',
        'images/s10.png', 'images/s11.png', 'images/s12.png'
    ];
    var frame = 0;
    var loopCount = 0;
    var maxLoops = 10; // Number of times to iterate
    var spriteImage;

    function init(){
        spriteImage = document.getElementById('image');
    }

    function animate(){
        frame += 1;
        if (frame >= imgList.length){
            frame = 0;
            loopCount += 1; // Increment loop count when one cycle is complete
        }
        if (loopCount < maxLoops){
            spriteImage.src = imgList[frame];
        } else {
            spriteImage.src = initImage[0];
            clearInterval(animationInterval); // Stop animation after 10 loops
        }
    }

    var animationInterval;

    function startAnimation() {
    var frame = 0; // Reset frame
    var loopCount = 0; // Reset loop count
    animationInterval = setInterval(animate, 100); // Start animation

    // Redirect the user to the "test_url" after the animation starts
    var mosip_url = "https://esignet.collab.mosip.net/login?nonce=ere973eieljznge2311&state=eree2311#eyJ0cmFuc2FjdGlvbklkIjoiLUg0aW9MQ0hXbHk5dzFrTTFKR1p5RUVBR3ZMSkpxMTdkaGRqWTEtWDdzcyIsImxvZ29VcmwiOiJodHRwczovL2kuaWJiLmNvL2tRNFZzTHcvbG9nby1UcmFpcy5wbmciLCJhdXRoRmFjdG9ycyI6W1t7InR5cGUiOiJPVFAiLCJjb3VudCI6MCwic3ViVHlwZXMiOm51bGx9XSxbeyJ0eXBlIjoiQklPIiwiY291bnQiOjEsInN1YlR5cGVzIjpudWxsfV1dLCJhdXRob3JpemVTY29wZXMiOltdLCJlc3NlbnRpYWxDbGFpbXMiOltdLCJ2b2x1bnRhcnlDbGFpbXMiOlsiYmlydGhkYXRlIiwiYWRkcmVzcyIsImdlbmRlciIsIm5hbWUiLCJwaG9uZV9udW1iZXIiLCJlbWFpbCIsInBpY3R1cmUiXSwiY29uZmlncyI6eyJzYmkuZW52IjoiRGV2ZWxvcGVyIiwic2JpLnRpbWVvdXQuRElTQyI6MzAsInNiaS50aW1lb3V0LkRJTkZPIjozMCwic2JpLnRpbWVvdXQuQ0FQVFVSRSI6MzAsInNiaS5jYXB0dXJlLmNvdW50LmZhY2UiOjEsInNiaS5jYXB0dXJlLmNvdW50LmZpbmdlciI6MSwic2JpLmNhcHR1cmUuY291bnQuaXJpcyI6MSwic2JpLmNhcHR1cmUuc2NvcmUuZmFjZSI6NzAsInNiaS5jYXB0dXJlLnNjb3JlLmZpbmdlciI6NzAsInNiaS5jYXB0dXJlLnNjb3JlLmlyaXMiOjcwLCJyZXNlbmQub3RwLmRlbGF5LnNlY3MiOjE4MCwic2VuZC5vdHAuY2hhbm5lbHMiOiJlbWFpbCxwaG9uZSIsImNhcHRjaGEuc2l0ZWtleSI6IjZMYzdrQ2tsQUFBQUFKLWRpcGtwNUlhWEVfSUhjOFloVDlLaUJJa3MiLCJjYXB0Y2hhLmVuYWJsZSI6IiIsImF1dGgudHhuaWQubGVuZ3RoIjoiMTAiLCJjb25zZW50LnNjcmVlbi50aW1lb3V0LWluLXNlY3MiOjYwMCwiY29uc2VudC5zY3JlZW4udGltZW91dC1idWZmZXItaW4tc2VjcyI6NSwibGlua2VkLXRyYW5zYWN0aW9uLWV4cGlyZS1pbi1zZWNzIjoyNDAsInNiaS5wb3J0LnJhbmdlIjoiNDUwMS00NjAwIiwic2JpLmJpby5zdWJ0eXBlcy5pcmlzIjoiVU5LTk9XTiIsInNiaS5iaW8uc3VidHlwZXMuZmluZ2VyIjoiVU5LTk9XTiIsIndhbGxldC5xci1jb2RlLWJ1ZmZlci1pbi1zZWNzIjoxMCwib3RwLmxlbmd0aCI6NiwicGFzc3dvcmQucmVnZXgiOiJeLns4LDIwfSQiLCJwYXNzd29yZC5tYXgtbGVuZ3RoIjozMCwidXNlcm5hbWUucmVnZXgiOiJeWzAtOV17MTAsMzB9JCIsInVzZXJuYW1lLnByZWZpeCI6IiIsInVzZXJuYW1lLnBvc3RmaXgiOiIiLCJ1c2VybmFtZS5tYXgtbGVuZ3RoIjoxNiwidXNlcm5hbWUuaW5wdXQtdHlwZSI6Im51bWJlciIsIndhbGxldC5jb25maWciOlt7IndhbGxldC5uYW1lIjoiSW5qaSBNb2JpbGUgQXBwIiwid2FsbGV0LmxvZ28tdXJsIjoiaW5qaV9sb2dvLnBuZyIsIndhbGxldC5kb3dubG9hZC11cmkiOiIjIiwid2FsbGV0LmRlZXAtbGluay11cmkiOiJpbmppOi8vbGFuZGluZy1wYWdlLW5hbWU/bGlua0NvZGU9TElOS19DT0RFJmxpbmtFeHBpcmVEYXRlVGltZT1MSU5LX0VYUElSRV9EVCJ9XSwic2lnbnVwLmNvbmZpZyI6eyJzaWdudXAuYmFubmVyIjp0cnVlLCJzaWdudXAudXJsIjoiaHR0cHM6Ly9zaWdudXAuY29sbGFiLm1vc2lwLm5ldC9zaWdudXAifSwiZm9yZ290LXBhc3N3b3JkLmNvbmZpZyI6eyJmb3Jnb3QtcGFzc3dvcmQiOnRydWUsImZvcmdvdC1wYXNzd29yZC51cmwiOiJodHRwczovL3NpZ251cC5jb2xsYWIubW9zaXAubmV0L3Jlc2V0LXBhc3N3b3JkIn0sImVycm9yLmJhbm5lci5jbG9zZS10aW1lciI6MTAsImF1dGguZmFjdG9yLmtiYS5pbmRpdmlkdWFsLWlkLWZpZWxkIjoiIiwiYXV0aC5mYWN0b3Iua2JhLmZpZWxkLWRldGFpbHMiOltdfSwicmVkaXJlY3RVcmkiOiJodHRwczovL3RyYWlzLWFncm8tZGVhbGVyLXdlYi52ZXJjZWwuYXBwL1VzZXJEZXRhaWxzIiwiY2xpZW50TmFtZSI6eyJAbm9uZSI6IlNtYXJ0IFRyYWNlYWJsZSBBZ3JpY3VsdHVyZSJ9LCJjcmVkZW50aWFsU2NvcGVzIjpbXX0="; // Replace with your URL
    window.location.href = mosip_url;
}
</script>

</body>
</html>
<?php } ?>
