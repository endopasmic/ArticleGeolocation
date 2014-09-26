
<head>
<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());

?>

<!-- import Geolocation V3 -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link href='//fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<link type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">

</head>

<?php
if($UserId=="")
{
	//echo "<script>window.location.replace('/CakePHP/User/Login');</script>";
} 
echo $this->Html->css('main');
echo $this->Html->css('arrow');
echo $this->Html->css('menu_button');
echo $this->Html->css('menu_icon');
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
<div id="header">

	<div id="header_border"></div>
	<div id="header_image">
		<div onclick="menu()">
			<a id="menu" href="#" class="nav-toggle">
				    <i class="menu">
				      <span></span>
				    </i>
			</a>
		</div>
	
		<?php
		echo $this->Html->link(
			 $this->Html->image('web_logo.png',array(
			'id' => 'logo_image',
			'align' => 'center'
			)),
			array(
			'controller' => 'Article',
			'action' => 'Home'
			),
			array('id' => 'logo','escape' => false)
			);				
		?>
	</div>
</div>
		
<div id="menu_popup">
			
	<!-- check session if login or not login -->
	<!-------------------- not login case ------------------------------------>
	<?php
	if($UserId=="")
	{
	?>		
		<div id="menu_content">
			<?php
				echo $this->Html->link(
					'Register 登録',
					array(
					'controller' => 'User',
					'action' => 'Register'
					),
					array(
					'id' => "menu_link"
					)	
				);				
			?>
			<div id="menu_arrow">
				<?php
					echo $this->Html->link('',
					array(
					'controller' => 'User',
					'action' => 'Register'
					),
					array(
					'class' => "arrow"
						)	
					);				
				?>								
			</div>				
		</div><!-- end menu content -->
			
		<div id="menu_line"></div>

        <div id="menu_content">
           		<?php
					//check session UserId
					echo $this->Html->link('Login　ログイン',array(
						'controller' => 'User',
						'action' => 'Login'
					),
					array(
						'id' => "menu_link"
						)
					);
				?>
				<div id="menu_arrow">
				<?php
					echo $this->Html->link('',array(
						'controller' => 'User',
						'action' => 'Login'
					),
					array(
						'class' => "arrow"
						)
					);
				?>
				</div>
		</div>

		<div id="menu_line"></div>		
		<?php				
		}//end if	
		?>
	
	<!-------------------- login case ---------------------------------------------->
	
	<?php 		
	if($UserId!="")
	{
	?>		
		<div id="menu_content">
			<?php		
				echo $this->Html->link(
						'Add new article 新日記登録',
						array(
							'controller' => 'Article',
							'action' => 'NewArticle'
							),
						array(
							'id' => "menu_link"
							)
						);
			?>
			<div id="menu_arrow">
				<?php
					echo $this->Html->link(
						'',
						array(
							'controller' => 'Article',
							'action' => 'NewArticle'
							),
						array(
							'class' => "arrow"
							)
						);	
				?>								
			</div>	
		</div>
		
		<div id="menu_line"></div>
		
		<div id="menu_content">	
			<?php
				echo $this->Html->link(
						'Save current location 現場を登録',	
						array(
							'controller' => 'Location',
							'action' => 'CurrentLocation'	
							),
						array(
							'id' => "menu_link"
							)
						);
			?>
			<div id="menu_arrow">
				<?php
					echo $this->Html->link(
						'',	
						array(
							'controller' => 'Location',
							'action' => 'CurrentLocation'	
							),
						array(
							'class' => "arrow"
							)
						);
				?>								
			</div>
		</div>
		
		<div id="menu_line"></div>
		
		<div id="menu_content">	
			<?php 
				echo $this->Html->link(
					'Search location 検索で場所を登録',
					array(
						'controller' => 'Location',
						'action' => 'SearchLocation'
						),
						array(
							'id' => "menu_link"
						)	
					);
			?>
			<div id="menu_arrow">
				<?php 
				echo $this->Html->link(
					'',
					array(
						'controller' => 'Location',
						'action' => 'SearchLocation'
						),
						array(
							'class' => "arrow"
						)	
					);
				?>							
			</div>
		</div>
		
		<div id="menu_line"></div>
		
		<div id="menu_content">	
			<?php 			
				echo $this->Html->link(
					'My page マイページ',
						array(
							'controller' => 'User',
							'action' => 'UserPage',$UserId
							),
							array(
								'id' => 'menu_link'
							)
						);
			?>
			<div id="menu_arrow">
				<?php
					echo $this->Html->link(
						'',
							array(
								'controller' => 'User',
								'action' => 'UserPage',$UserId
								),
								array(
									'class' => 'arrow'
								)
						);		
				?>								
			</div>
		</div>
		
		<div id="menu_line"></div>
		
		<div id="menu_content">	
			<?php
				echo $this->Html->link('Logout ログアウト',array(
							'controller' => 'User',
							'action' => 'Logout'
					),
					array(
						'id' => "menu_link"
						)
					);
			
			?>
			<div id="menu_arrow">
				<?php
					echo $this->Html->link('',array(
							'controller' => 'User',
							'action' => 'Logout'
					),
					array(
						'class' => "arrow"
						)
					);	
				?>								
			</div>				
		</div>

		<div id="menu_line"></div>
         <?php 	}//end if loging in ?> 
        <div id="menu_content">

          	<a id="menu_link">About us</a>
          	
          	<div id="menu_arrow">
			<a href="#" class="arrow"></a>								
			</div>
			
    	</div> 
</div><!--end menu popup  -->

<?php echo $this->fetch('content'); ?>

</body>
<script>
var check=0;
function menu(){
    //$("#mobile_menu").slideDown(300);

          if(check==0)
          {
              //alert("check");
              $("#menu_popup").css({
                visibility: "visible",
                display:"none"
              }).slideDown(300);
              check=1;
         
          }
          else if(check==1)
          {
           // alert("check2");
            //$("#language-dropdown").css("display","none").slideUp(300);

            $('#menu_popup').css({
                  visibility: "visible",
                  display: "block"
              }).slideUp(300);
             check=0;
          } 

  }   

</script>


</html>