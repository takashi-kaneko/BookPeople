<HTML>
<HEAD>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<TITLE></TITLE>
<link rel="stylesheet" href="common/css/default.css" type="text/css" />
</HEAD>
<BODY>
<form {$form.attributes}>
{if $user ne ''}
    <h4>You</h4>
    <img src="https://graph.facebook.com/{$user}/picture">
    <h4>{$count} Friends </h4>
    <DIV class="scr">
{$friendsData}
	</DIV>

{else}
    <a href="{$login_url}">Login</a>
{/if}
{$form.comment.html}
{$comment_text}
<a href="{$logout_url}">Logout</a>

</form>
</BODY>
</HTML>