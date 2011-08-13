<?php

//アクセスキーとアソシエイトID
define("Access_Key_ID", "AKIAJYETCBQNW5T2GB2Q");
define("SecretKey", "UGGOJMG/OwXVafjbeB4HdqKbOBRk49Hyt5mdUrwD");
define("Associate_tag", "");


// RFC3986 形式でURLエンコード
function urlencode_rfc3986($str)
{
    return str_replace('%7E', '~', rawurlencode($str));
}

// URL(文字列)を編集する
function getURL(&$params,$baseurl)
{
	// パラメータの順序を昇順に並び替えます
	ksort($params);

	// canonical string を作成します
	$canonical_string = '';
	foreach ($params as $k => $v) {
	    $canonical_string .= '&'.urlencode_rfc3986($k).'='.urlencode_rfc3986($v);
	}
	$canonical_string = substr($canonical_string, 1);

	// 署名を作成します
	// - 規定の文字列フォーマットを作成
	// - HMAC-SHA256 を計算
	// - BASE64 エンコード
	$parsed_url = parse_url($baseurl);
	$string_to_sign = "GET\n{$parsed_url['host']}\n{$parsed_url['path']}\n{$canonical_string}";

	//	証明書をエンコードする
	$signature = base64_encode(hash_hmac('sha256', $string_to_sign, SecretKey, true));	//	ここで秘密キーを設定して暗号化する


	// URL を作成します
	// - リクエストの末尾に署名を追加
	return  $baseurl.'?'.$canonical_string.'&Signature='.urlencode_rfc3986($signature);

}
?>