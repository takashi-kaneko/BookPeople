<?php
	include("src/common/amazon.php");


	$SearchIndex = "Books";
	$Keywords = $_GET['Keywords'];
	$PageNo = 1;
	if (isset($_GET['PageNo'])) {
		$PageNo = $_GET['PageNo'];
	}

	ItemSearch($SearchIndex, $Keywords, $PageNo);

	//Set up the operation in the request
	function ItemSearch($SearchIndex, $Keywords, $PageNo){
		//Set the values for some of the parameters.
		$Operation = "ItemSearch";
		$Version = "2009-03-31";
		$ResponseGroup = "ItemAttributes,Offers,Images";

		$baseUrl = "http://ecs.amazonaws.jp/onca/xml";
		//URLにつけるパラメータを連想配列に入れる
		$params = array();
		$params["Service"] = "AWSECommerceService";
		$params["AssociateTag"] = Associate_tag;
		$params["AWSAccessKeyId"] = Access_Key_ID;
		$params["Operation"] = $Operation;
		$params["Version"] = $Version;
		$params["SearchIndex"] = $SearchIndex;
		$params["Keywords"] = $Keywords;
		$params["ResponseGroup"] = $ResponseGroup;
		$params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
		$params["ItemPage"] = $PageNo;

		// create URL strings.
		$url = getURL($params,$baseUrl);	//	service = itemSearch

		// request to amazon !!
		$response = file_get_contents($url);

		// response to strings.
		$parsed_xml = null;
		if(isset($response)){
			$parsed_xml = simplexml_load_string($response);
		}

		echo '検索結果：'.$parsed_xml->Items->TotalResults .'件<br>カテゴリ：'.$SearchIndex."<br>キーワード：".$Keywords."<br><br>";

		//ページ制御
		$TotalPages = $parsed_xml->Items->TotalPages;
		$self = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES);
		$query = $_SERVER['QUERY_STRING'];
		$nav = '';
		if($PageNo <= $TotalPages){
			$nav .= '<p class="nav">[ '.($PageNo > 1 ? '<a href="'.$self.'?'
			.str_replace('PageNo='.$PageNo, 'PageNo='.($PageNo - 1), $query).'"> &lt;&lt; 前のページ</a> | ' : '')
			.' <strong>'.$PageNo.'</strong> /'.$TotalPages.''.($PageNo < $TotalPages ? ' | <a href="'.$self.'?'
			.str_replace('PageNo='.$PageNo, 'PageNo='.($PageNo + 1), $query).'">次のページ &gt;&gt;</a>' : '').' ]</p>';
		}
		echo $nav;

		echo '<table border=0>';
		for ($i = 0; $i < $parsed_xml->Items->TotalResults; $i++) {
			if (!empty($parsed_xml->Items->Item[$i])) {
				if ($i % 5 == 0) {
					echo '<tr>';
				}

				echo '<td width="80">';
				if (isset($parsed_xml->Items->Item[$i]->MediumImage->URL)) {
					//画像ありのとき
					echo '<img src="' . $parsed_xml->Items->Item[$i]->MediumImage->URL . '" title="'.$parsed_xml->Items->Item[$i]->ItemAttributes->Title.'"/><br />';
				} else {
					echo ''.$parsed_xml->Items->Item[$i]->ItemAttributes->Title;
				}

				echo '</td>';
				if ($i % 5 == 4) {
					echo '</tr>';
				}
			}
		}
		echo '</table>';

	}
?>