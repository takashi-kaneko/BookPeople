<HTML>
<HEAD>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<TITLE></TITLE>
<link href="common/css/default.css" rel="stylesheet" type="text/css" />
<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="common/js/jquery.min.js"></script>
<script src="common/js/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
</script>
</HEAD>
<BODY>
<div id="tabs">
    <ul>
        <li><a href="#fragment-1"><span>あいう</span></a></li>
        <li><a href="#fragment-2"><span>本棚</span></a></li>
        <li><a href="#fragment-3"><span>友達リスト</span></a></li>
    </ul>
    <div id="fragment-1">
        ああああ
    </div>
    <div id="fragment-2">
        本棚
    </div>
    <div id="fragment-3">
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
    </div>
</div>

</BODY>
</HTML>