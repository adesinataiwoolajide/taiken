<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="test.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript">

    $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'store_items.php',
        data:{
          total_cart_items:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });

    function cart(id)
    {
	  var ele=document.getElementById(id);
	  var img_src=ele.getElementsByTagName("img")[0].src;
	  var name=document.getElementById(id+"_name").value;
	  var price=document.getElementById(id+"_price").value;
	
	  $.ajax({
        type:'post',
        url:'store_items.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });
	
    }

    function show_cart()
    {
      $.ajax({
      type:'post',
      url:'store_items.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });

    }
	
</script>
  
</head>

<body>

<p id="cart_button" onclick="show_cart();">
  <img src="cart_icon.png">
  <input type="button" id="total_items" value="">
</p>

<div id="mycart">
</div>

<h1>Simple Add To Cart System Using jQuery,Ajax And PHP</h1>

<div id="item_div">

  <div class="items" id="item1">
    <img src="product1.jpg">
    <input type="button" value="Add To CART" onclick="cart('item1')">
    <p>Simple Navy Blue T-Shirt</p>
    <p>Price - $95</p>
    <input type="hidden" id="item1_name" value="Simple Navy Blue T-Shirt">
    <input type="hidden" id="item1_price" value="$95">
  </div>

  <div class="items" id="item2">
    <img src="product2.jpg">
    <input type="button" value="Add To CART" onclick="cart('item2')">
    <p>Trendy T-Shirt With Back Design</p>
    <p>Price - $105</p>
    <input type="hidden" id="item2_name" value="Trendy T-Shirt With Back Design">
    <input type="hidden" id="item2_price" value="$105">
  </div>
  
  <div class="items" id="item3">
    <img src="product3.jpg">
    <input type="button" value="Add To CART" onclick="cart('item3')">
    <p>Two Color Half-Sleeves T-Shirt</p>
    <p>Price - $120</p>
    <input type="hidden" id="item3_name" value="Two Color Half-Sleeves T-Shirt">
    <input type="hidden" id="item3_price" value="$120">
  </div>

  <div class="items" id="item4">
    <img src="product4.jpg">
    <input type="button" value="Add To CART" onclick="cart('item4')">
    <p>Stylish Grey Chinos For Mens</p>
    <p>Price - $140</p>
    <input type="hidden" id="item4_name" value="Stylish Grey Chinos For Mens">
    <input type="hidden" id="item4_price" value="$140">
  </div>

  <div class="items" id="item5">
    <img src="product5.jpg">
    <input type="button" value="Add To CART" onclick="cart('item5')">
    <p>Comfortable Pants For Working</p>
    <p>Price - $130</p>
    <input type="hidden" id="item5_name" value="Comfortable Pants For Working">
    <input type="hidden" id="item5_price" value="$130">
  </div>

  <div class="items" id="item6">
    <img src="product6.jpg">
    <input type="button" value="Add To CART" onclick="cart('item6')">
    <p>Slim Track Pant For Jogging</p>
    <p>Price - $90</p>
    <input type="hidden" id="item6_name" value="Slim Track Pant For Jogging">
    <input type="hidden" id="item6_price" value="$90">
  </div>

</div>

</body>
</html>
<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
  echo count($_SESSION['name']);
  exit();
  }

  if(isset($_POST['item_src']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['price'][]=$_POST['item_price'];
    $_SESSION['src'][]=$_POST['item_src'];
    echo count($_SESSION['name']);
    exit();
  }

  if(isset($_POST['showcart']))
  {
    for($i=0;$i<count($_SESSION['src']);$i++)
    {
      echo "<div class='cart_items'>";
      echo "<img src='".$_SESSION['src'][$i]."'>";
      echo "<p>".$_SESSION['name'][$i]."</p>";
      echo "<p>".$_SESSION['price'][$i]."</p>";
      echo "</div>";
    }
    exit(); 
  }
?>