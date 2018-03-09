<?php
$url = 'https://api.coinmarketcap.com/v1/ticker/bitcoin/'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
$bitcoin3 = $characters[0]->symbol;
$bitcoin4 = $characters[0]->price_usd;
$bitcoin5 = $characters[0]->price_btc;
$bitcoin7 = $characters[0]->available_supply;
$bitcoin8 = $characters[0]->total_supply;
$bitcoin9 = $characters[0]->percent_change_1h;
$bitcoin10 = $characters[0]->percent_change_24h;
$bitcoin11 = $characters[0]->percent_change_7d;
$bitcoin12 = $characters[0]->last_updated;
$bitcoin13 = date('Y-m-d h:i:s', $bitcoin12);

$url1 = 'https://api.coinmarketcap.com/v1/ticker/ethereum/'; // path to your JSON file
$data1 = file_get_contents($url1); // put the contents of the file into a variable
$new = json_decode($data1); // decode the JSON feed
$ethereum1 = $new[0]->id;
$ethereum2 = $new[0]->name;
$ethereum3 = $new[0]->symbol;
$ethereum4 = $new[0]->price_usd;
$ethereum5 = $new[0]->price_btc;
$ethereum7 = $new[0]->available_supply;
$ethereum8 = $new[0]->total_supply;
$ethereum9 = $new[0]->percent_change_1h;
$ethereum10 = $new[0]->percent_change_24h;
$ethereum11 = $new[0]->percent_change_7d;
$ethereum12 = $new[0]->last_updated;

$url2 = 'https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/'; // path to your JSON file
$data2 = file_get_contents($url2); // put the contents of the file into a variable
$new1 = json_decode($data2); // decode the JSON feed
$bitcoin_cash1 = $new1[0]->id;
$bitcoin_cash2 = $new1[0]->name;
$bitcoin_cash3 = $new1[0]->symbol;
$bitcoin_cash4 = $new1[0]->price_usd;
$bitcoin_cash5 = $new1[0]->price_btc;
$bitcoin_cash7 = $new1[0]->available_supply;
$bitcoin_cash8 = $new1[0]->total_supply;
$bitcoin_cash9 = $new1[0]->percent_change_1h;
$bitcoin_cash10 = $new1[0]->percent_change_24h;
$bitcoin_cash11 = $new1[0]->percent_change_7d;
$bitcoin_cash12 = $new1[0]->last_updated;

$url3 = 'https://api.coinmarketcap.com/v1/ticker/litecoin/'; // path to your JSON file
$data3= file_get_contents($url3); // put the contents of the file into a variable
$new2 = json_decode($data3); // decode the JSON feed
$litecoin1 = $new2[0]->id;
$litecoin2 = $new2[0]->name;
$litecoin3 = $new2[0]->symbol;
$litecoin4 = $new2[0]->price_usd;
$litecoin5 = $new2[0]->price_btc;
$litecoin7 = $new2[0]->available_supply;
$litecoin8 = $new2[0]->total_supply;
$litecoin9 = $new2[0]->percent_change_1h;
$litecoin10 = $new2[0]->percent_change_24h;
$litecoin11 = $new2[0]->percent_change_7d;
$litecoin12 = $new2[0]->last_updated;
?>



<ul class="nav nav-tabs">
  <li class="active col-md-3"><a data-toggle="tab" href="#bitcoin">Bitcoin</a></li>
  <li class='col-md-3'><a data-toggle="tab" href="#ethereum">Ethereum</a></li>
  <li class='col-md-3'><a data-toggle="tab" href="#bitcoincash">Bitcoin-Cash</a></li>
  <li class='col-md-3'><a data-toggle="tab" href="#litecoin">Litecoin</a></li>
</ul>

<div class="tab-content">
  <div id="bitcoin" class="tab-pane fade in active">
    <h3><?php echo $bitcoin3;?></h3>
    <div class='col-md-3'  style="border:1px solid black">
	<b>Price USD:</b><p>&nbsp;<?php echo $bitcoin4;?></p>
	<b>Price BTC:</b><p>&nbsp;<?php echo $bitcoin5;?></p>
	</div>
    <div class='col-md-3'  style="border:1px solid black">
	<b>Available Supply:</b><p>&nbsp;<?php echo $bitcoin7;?></p>
	<b>Total Supply:</b><p>&nbsp;<?php echo $bitcoin8;?></p>
	</div>
    <div class='col-md-3'  style="border:1px solid black">
	<b>Percent Change 1h:</b><p>&nbsp;<?php echo $bitcoin9;?></p>
	<b>Percent Change 24h:</b><p>&nbsp;<?php echo $bitcoin10;?></p>
	</div>
	 <div class='col-md-3'  style="border:1px solid black">
	<b>Percent Change 7d:</b><p>&nbsp;<?php echo $bitcoin11;?></p>
	<b>Last Updated:</b><p>&nbsp;<?php echo $bitcoin12;?></p>
	</div>
  </div>
  <div id="ethereum" class="tab-pane fade">
    <h3><?php echo $ethereum3;?></h3>
	 <div class='col-md-3' style="border:1px solid black">
   <b>Price USD:</b><p>&nbsp;<?php echo $ethereum4;?></p>
	<b>Price BTC:</b><p>&nbsp;<?php echo $ethereum5;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Available Supply:</b><p>&nbsp;<?php echo $ethereum7;?></p>
	<b>Total Supply:</b><p>&nbsp;<?php echo $ethereum8;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 1h:</b><p>&nbsp;<?php echo $ethereum9;?></p>
	<b>Percent Change 24h:</b><p>&nbsp;<?php echo $ethereum10;?></p>
	</div>
	 <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 7d:</b><p>&nbsp;<?php echo $ethereum11;?></p>
	<b>Last Updated:</b><p>&nbsp;<?php echo $ethereum12;?></p>
  </div>
  </div>
  <div id="bitcoincash" class="tab-pane fade">
    <h3><?php echo $bitcoin_cash3;?></h3>
	 <div class='col-md-3' style="border:1px solid black">
   <b>Price USD:</b><p>&nbsp;<?php echo $bitcoin_cash4;?></p>
	<b>Price BTC:</b><p>&nbsp;<?php echo $bitcoin_cash5;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Available Supply:</b><p>&nbsp;<?php echo $bitcoin_cash7;?></p>
	<b>Total Supply:</b><p>&nbsp;<?php echo $bitcoin_cash8;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 1h:</b><p>&nbsp;<?php echo $bitcoin_cash9;?></p>
	<b>Percent Change 24h:</b><p>&nbsp;<?php echo $bitcoin_cash10;?></p>
	</div>
	 <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 7d:</b><p>&nbsp;<?php echo $bitcoin_cash11;?></p>
	<b>Last Updated:</b><p>&nbsp;<?php echo $bitcoin_cash12;?></p>
  </div>
  </div>
   <div id="litecoin" class="tab-pane fade">
    <h3><?php echo $litecoin3;?></h3>
	 <div class='col-md-3' style="border:1px solid black">
   <b>Price USD:</b><p>&nbsp;<?php echo $litecoin4;?></p>
	<b>Price BTC:</b><p>&nbsp;<?php echo $litecoin5;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Available Supply:</b><p>&nbsp;<?php echo $litecoin7;?></p>
	<b>Total Supply:</b><p>&nbsp;<?php echo $litecoin8;?></p>
	</div>
    <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 1h:</b><p>&nbsp;<?php echo $litecoin9;?></p>
	<b>Percent Change 24h:</b><p>&nbsp;<?php echo $litecoin10;?></p>
	</div>
	 <div class='col-md-3' style="border:1px solid black">
	<b>Percent Change 7d:</b><p>&nbsp;<?php echo $litecoin11;?></p>
	<b>Last Updated:</b><p>&nbsp;<?php echo $litecoin12;?></p>
  </div>
  </div>
</div>
</div>
</div>
</div>