<?php

  require_once('../db_connect.php');
  if (isset($_GET['token'])) {
  $id=substr_replace($_GET['token'],"",-31 );
}

if (!isset($_GET['update'])) {



 if (isset($_GET['token'])) {
  $id=substr_replace($_GET['token'],"",-31 );
    $get=mysqli_query($con,"SELECT * FROM akit_reg WHERE id='".$id."' LIMIT 1");
    
     while ($row = mysqli_fetch_assoc($get)) {
    echo $row['id'];
    $i=0;
    
?>
<div class="wrapper">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
        <header>
            <h1>Settings</h1>
        </header>
        <section>
            <div class="form">


                <?php if ($row['name']==NULL) { $i++; ?> 

                <div class="input-item">
                    <div class="label-part">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="name" value="<?php echo $row['name'] ?>" placeholder="<?php echo $row['name'] ?>" onfocus="this.value = this.value;" />
                    </div>
                    </div>
                 <?php   } else { ?>

                  <div class="input-item">
                    <div class="label-part">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="name" value="<?php echo $row['name'] ?>" placeholder="<?php echo $row['name'] ?>" onfocus="this.value = this.value;" readonly />
                    </div>
                    </div>

                    <?php } ?>


                    <?php if ($row['email']==NULL) { $i+=2; ?> 


                <div class="input-item">
                    <div class="label-part">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="email" value="<?php echo $row['email'] ?>"  placeholder="<?php echo $row['email'] ?>"  />
                    </div>
                </div>

                <?php   } else { ?>

                <div class="input-item">
                    <div class="label-part">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="email" value="<?php echo $row['email'] ?>"  placeholder="<?php echo $row['email'] ?>" readonly  />
                    </div>
                </div>

                <?php } ?>



                    <?php if ($row['phone']==NULL) { $i+=4; ?> 


                <div class="input-item">
                    <div class="label-part">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" value="<?php echo $row['phone'] ?>" id="phone" placeholder="<?php echo $row['phone'] ?>" />
                    </div>
                </div>

                <?php   } else { ?>

                <div class="input-item">
                    <div class="label-part">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" value="<?php echo $row['phone'] ?>" id="phone" placeholder="<?php echo $row['phone'] ?>" readonly />
                    </div>
                </div>

                <?php } ?>
 
            </div>
        </section>
        <footer>
            <a href="logout.php" class="cancel"><span>&larr;</span> Logout</a>

            <?php if ($i!=0) { ?>
            
               <a onclick="update();" class="save">Save <span>&rarr;</span></a>

            <?php   } ?>

            <?php if ($i==0) { ?>
            
               <a href="https://lockwoodinv.com/?campaign=71&lang=it" class="save">Continue to Lockwood <span>&rarr;</span></a>

            <?php   } ?>

        </footer>
    </div>
</div>
<?php echo $i; 
  
  if ($i==1) {
    echo "<script type='text/javascript'>
          function update(){
          var url='app.php?token=".$id."7c96b93ef245f5b201f1fdef8fc1566';
          var name=$('#name').val();
          $.post(url+'&update=name',{name:name},function (data) {
          console.log(data);
          window.location.reload();
          });
          }
          </script>";
   
  } elseif ($i==2) {
        echo "<script type='text/javascript'>
          function update(){
          var url='app.php?token=".$id."7c96b93ef245f5b201f1fdef8fc1566';
          var email=$('#email').val();
          $.post(url+'&update=email',{email:email},function (data) {
          console.log(data);
          window.location.reload();
          });
          }
          </script>";
    
  } elseif ($i==4) {
    echo "<script type='text/javascript'>
          function update(){
          var url='app.php?token=".$id."7c96b93ef245f5b201f1fdef8fc1566';
          var phone=$('#phone').val();
          $.post(url+'&update=phone',{phone:phone},function (data) {
          console.log(data);
          window.location.reload();
          });
          }
          </script>";
  } elseif ($i==3) {
    echo "<script type='text/javascript'>
          function update(){
          var url='app.php?token=".$id."7c96b93ef245f5b201f1fdef8fc1566';
          var name=$('#name').val();
          var email=$('#email').val();

          $.post(url+'&update=nameemail',{name:name,email:email},function (data) {
          console.log(data);
          window.location.reload();
          });
          }
          </script>";
  } elseif ($i==5) {
    echo "<script type='text/javascript'>
          function update(){
          var url='app.php?token=".$id."7c96b93ef245f5b201f1fdef8fc1566';
          var name=$('#name').val();
          var phone=$('#phone').val();

          $.post(url+'&update=namephone',{name:name,phone:phone},function (data) {
          console.log(data);
          window.location.reload();
          });
          }
          </script>";
  }
  







?>





<?php 
}

} else { echo "no token"; } ?>

<link rel="stylesheet" type="text/css"  href="style.css"/>

<?php }  else{

  if ($_GET['update']=='name') {

    $update=mysqli_query($con,"UPDATE akit_reg SET name='".$_POST['name']."' WHERE id='".$id."'");
    echo "Name updated";
    
  }

  if ($_GET['update']=='email') {

    $update=mysqli_query($con,"UPDATE akit_reg SET email='".$_POST['email']."' WHERE id='".$id."'");
    echo "Email updated";
    
  }

  if ($_GET['update']=='phone') {

    $update=mysqli_query($con,"UPDATE akit_reg SET phone='".$_POST['phone']."' WHERE id='".$id."'");
    echo "Phone updated";
    
  }

  if ($_GET['update']=='nameemail') {

    $update=mysqli_query($con,"UPDATE akit_reg SET name='".$_POST['name']."',email='".$_POST['email']."' WHERE id='".$id."'");
    echo "NameEmail updated";
    
  }

  if ($_GET['update']=='namephone') {

    $update=mysqli_query($con,"UPDATE akit_reg SET name='".$_POST['name']."',phone='".$_POST['phone']."' WHERE id='".$id."'");
    echo "NamePhone updated";
    
  }







  } ?>