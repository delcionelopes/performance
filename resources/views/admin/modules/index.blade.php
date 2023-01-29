@extends('layouts.master')

@section('content')

<style>
.custom-select {
    font-family: 'Lato', 'Font Awesome 5 Free', 'Font Awesome 5 Brands';
    font-weight: 900;
}
</style>


<!--AddModuleModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddModuleModal" tabindex="-1" role="dialog" aria-labelledby="addtitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="addtitleModalLabel" style="color: white;">Adicionar Módulos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addmyform" name="addmyform" class="form-horizontal" role="form">                 
                <ul id="saveform_errList"></ul>                   
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="name form-control">
                </div>
                <div class="form-group mb-3">                    
                           <div class="form-group">
                            <label for="addicone">Ícone</label>
                            <select name="addicone" id="addicone" class="icone custom-select">
                                    <option value="address-book">&#xf2b9; address-book</option>
                                    <option value="address-card">&#xf2bb; address-card</option>
                                    <option value="angry">&#xf556; angry</option>
                                    <option value="arrow-alt-circle-down">&#xf358; arrow-alt-circle-down</option>
                                    <option value="arrow-alt-circle-left">&#xf359; arrow-alt-circle-left</option>
                                    <option value="arrow-alt-circle-right">&#xf35a; arrow-alt-circle-right</option>
                                    <option value="arrow-alt-circle-up">&#xf35b; arrow-alt-circle-up</option>
                                    <option value="bell">&#xf0f3; bell</option>
                                    <option value="bell-slash">&#xf1f6; bell-slash</option>
                                    <option value="bookmark">&#xf02e; bookmark</option>
                                    <option value="building">&#xf1ad; building</option>
                                    <option value="calendar">&#xf133; calendar</option>
                                    <option value="calendar-alt">&#xf073; calendar-alt</option>
                                    <option value="calendar-check">&#xf274; calendar-check</option>
                                    <option value="calendar-minus">&#xf272; calendar-minus</option>
                                    <option value="calendar-plus">&#xf271; calendar-plus</option>
                                    <option value="calendar-times">&#xf273; calendar-times</option>
                                    <option value="caret-square-down">&#xf150; caret-square-down</option>
                                    <option value="caret-square-left">&#xf191; caret-square-left</option>
                                    <option value="caret-square-right">&#xf152; caret-square-right</option>
                                    <option value="caret-square-up">&#xf151; caret-square-up</option>
                                    <option value="chart-bar">&#xf080; chart-bar</option>
                                    <option value="check-circle">&#xf058; check-circle</option>
                                    <option value="check-square">&#xf14a; check-square</option>
                                    <option value="circle">&#xf111; circle</option>
                                    <option value="clipboard">&#xf328; clipboard</option>
                                    <option value="clock">&#xf017; clock</option>
                                    <option value="clone">&#xf24d; clone</option>
                                    <option value="closed-captioning">&#xf20a; closed-captioning</option>
                                    <option value="comment">&#xf075; comment</option>
                                    <option value="comment-alt">&#xf27a; comment-alt</option>
                                    <option value="comment-dots">&#xf4ad; comment-dots</option>
                                    <option value="comments">&#xf086; comments</option>
                                    <option value="compass">&#xf14e; compass</option>
                                    <option value="copy">&#xf0c5; copy</option>
                                    <option value="copyright">&#xf1f9; copyright</option>
                                    <option value="credit-card">&#xf09d; credit-card</option>
                                    <option value="dizzy">&#xf567; dizzy</option>
                                    <option value="dot-circle">&#xf192; dot-circle</option>
                                    <option value="edit">&#xf044; edit</option>
                                    <option value="envelope">&#xf40e0; envelope </option>
                                    <option value="envelope-open">&#xf2b6; envelope-open</option>
                                    <option value="eye">&#xf06e; eye</option>
                                    <option value="eye-slash">&#xf070; eye-slash</option>
                                    <option value="file">&#xf15b; file</option>
                                    <option value="file-alt">&#xf15c; file-alt</option>
                                    <option value="file-archive">&#xf1c6; file-archive</option>
                                    <option value="file-audio">&#xf1c7; file-audio</option>
                                    <option value="file-code">&#xf1c9; file-code</option>
                                    <option value="file-excel">&#xf1c3; file-excel </option>
                                    <option value="file-image">&#xf1c5; file-image</option>
                                    <option value="file-pdf">&#xf1c1; file-pdf</option>
                                    <option value="file-powerpoint">&#xf1c4; file-powerpoint</option>
                                    <option value="file-video">&#xf1c8; file-video</option>
                                    <option value="file-word">&#xf1c2; file-word</option>
                                    <option value="flag">&#xf024; flag</option>
                                    <option value="flushed">&#xf579; flushed</option>
                                    <option value="folder">&#xf07b; folder</option>
                                    <option value="folder-open">&#xf07c; folder-open </option>
                                    <option value="frown">&#xf119; frown</option>
                                    <option value="frown-open">&#xf57a; frown-open</option>
                                    <option value="futbol">&#xf1e3; futbol</option>
                                    <option value="gem">&#xf3a5; gem</option>
                                    <option value="grimace">&#xf57f; grimace</option>
                                    <option value="grin">&#xf580; grin</option>
                                    <option value="grin-alt">&#xf581; grin-alt</option>
                                    <option value="grin-beam">&#xf582; grin-beam</option>
                                    <option value="grin-beam-sweet">&#xf583; grin-beam-sweet </option>
                                    <option value="grin-hearts">&#xf584; grin-hearts</option>
                                    <option value="grin-squint">&#xf585; grin-squint</option>
                                    <option value="grin-squint-tears">&#xf586; grin-squint-tears</option>
                                    <option value="grin-stars">&#xf587; grin-stars</option>
                                    <option value="grin-tears">&#xf588; grin-tears</option>
                                    <option value="grin-tongue">&#xf589; grin-tongue</option>
                                    <option value="grin-tongue-squint">&#xf58a; grin-tongue-squint</option>
                                    <option value="grin-tongue-wink">&#xf58b; grin-tongue-wink</option>
                                    <option value="grin-wink">&#xf58c; grin-wink </option>
                                    <option value="hand-lizard">&#xf258; hand-lizard</option>
                                    <option value="hand-paper">&#xf256; hand-paper</option>
                                    <option value="hand-peace">&#xf25b; hand-peace</option>
                                    <option value="hand-point-down">&#xf0a7; hand-point-down</option>
                                    <option value="hand-point-left">&#xf0a5; hand-point-left</option>
                                    <option value="hand-point-right">&#xf0a4; hand-point-right</option>
                                    <option value="hand-point-up">&#xf0a6; hand-point-up</option>
                                    <option value="hand-pointer">&#xf25a; hand-pointer</option>
                                    <option value="hand-rock">&#xf255; hand-rock </option>
                                    <option value="hand-scissors">&#xf257; hand-scissors</option>
                                    <option value="hand-spock">&#xf259; hand-spock</option>
                                    <option value="handshake">&#xf2b5; handshake</option>
                                    <option value="hdd">&#xf0a0; hdd</option>
                                    <option value="heart">&#xf004; heart</option>
                                    <option value="home">&#xf015; home</option>
                                    <option value="hospital">&#xf0f8; hospital</option>
                                    <option value="hourglass">&#xf254; hourglass</option>
                                    <option value="id-badge">&#xf2c1; id-badge</option>
                                    <option value="id-card">&#xf2c2; id-card </option>
                                    <option value="image">&#xf03e; image</option>
                                    <option value="images">&#xf302; images</option>
                                    <option value="keyboard">&#xf11c; keyboard</option>
                                    <option value="kiss">&#xf596; kiss</option>
                                    <option value="kiss-beam">&#xf597; kiss-beam</option>
                                    <option value="kiss-wink-heart">&#xf598; kiss-wink-heart</option>
                                    <option value="laugh">&#xf599; laugh</option>
                                    <option value="laugh-beam">&#xf59a; laugh-beam</option>
                                    <option value="laugh-squint">&#xf59b; laugh-squint </option>
                                    <option value="laugh-wink">&#xf59c; laugh-wink</option>
                                    <option value="lemon">&#xf094; lemon</option>
                                    <option value="life-ring">&#xf1cd; life-ring</option>
                                    <option value="lightbulb">&#xf0eb; lightbulb</option>
                                    <option value="list-alt">&#xf022; list-alt</option>
                                    <option value="map">&#xf279; map</option>
                                    <option value="meh">&#xf11a; meh</option>
                                    <option value="meh-blank">&#xf5a4; meh-blank</option>
                                    <option value="meh-rolling-eyes">&#xf5a5; meh-rolling-eyes </option>
                                    <option value="minus-square">&#xf146; minus-square</option>
                                    <option value="money-bill-alt">&#xf3d1; money-bill-alt</option>
                                    <option value="moon">&#xf186; moon</option>
                                    <option value="newspaper">&#xf1ea; newspaper</option>
                                    <option value="object-group">&#xf247; object-group</option>
                                    <option value="object-upgroup">&#xf248; object-upgroup</option>
                                    <option value="paper-plane">&#xf1d8; paper-plane</option>
                                    <option value="pause-circle">&#xf28b; pause-circle</option>
                                    <option value="play-circle">&#xf144; play-circle </option>
                                    <option value="plus-square">&#xf0fe; plus-square</option>
                                    <option value="question-circle">&#xf059; question-circle</option>
                                    <option value="registered">&#xf25d; registered</option>
                                    <option value="sad-cry">&#xf5b3; sad-cry</option>
                                    <option value="sad-tear">&#xf5b4; sad-tear</option>
                                    <option value="save">&#xf0c7; save</option>
                                    <option value="share-square">&#xf14d; share-square</option>
                                    <option value="smile">&#xf118; smile</option>
                                    <option value="smile-beam">&#xf5b8; smile-beam </option>
                                    <option value="smile-wink">&#xf4da; smile-wink</option>
                                    <option value="snowflake">&#xf2dc; snowflake</option>
                                    <option value="square">&#xf0c8; square</option>
                                    <option value="star">&#xf005; star</option>
                                    <option value="star-half">&#xf089; star-half</option>
                                    <option value="sticky-note">&#xf249; sticky-note</option>
                                    <option value="stop-circle">&#xf28d; stop-circle</option>
                                    <option value="sun">&#xf185; sun</option>
                                    <option value="surprise">&#xf5c2; surprise </option>
                                    <option value="thumbs-down">&#xf165; thumbs-down</option>
                                    <option value="thumbs-up">&#xf1164; thumbs-up</option>
                                    <option value="times-circle">&#xf057; times-circle</option>
                                    <option value="tired">&#xf5c8; tired</option>
                                    <option value="trash-alt">&#xf2ed; trash-alt</option>
                                    <option value="user">&#xf007; user</option>
                                    <option value="user-circle">&#xf2bd; user-circle</option>
                                    <option value="window-close">&#xf410; window-close</option>
                                    <option value="window-maximize">&#xf2d0; window-maximize </option>
                                    <option value="window-minimize">&#xf2d1; window-minimize</option>
                                    <option value="window-restore">&#xf2d2; window-restore</option>        
                            </select>
                           </div>
                </div>   
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_module"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddModuleModal-->

<!--EditModuleModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="EditModuleModal" tabindex="-1" role="dialog" aria-labelledby="edittitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="edittitleModalLabel" style="color: white;">Editar e atualizar Módulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editmyform" name="editmyform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>               
                <input type="hidden" id="edit_module_id">
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" id="edit_name" class="name form-control">
                </div>   
                <div class="form-group mb-3">                                               
                            <label for="addicone">Ícone</label>
                            <select name="editicone" id="editicone" class="edit_icone custom-select">  
                                    <option value="address-book">&#xf2b9; address-book</option>
                                    <option value="address-card">&#xf2bb; address-card</option>
                                    <option value="angry">&#xf556; angry</option>
                                    <option value="arrow-alt-circle-down">&#xf358; arrow-alt-circle-down</option>
                                    <option value="arrow-alt-circle-left">&#xf359; arrow-alt-circle-left</option>
                                    <option value="arrow-alt-circle-right">&#xf35a; arrow-alt-circle-right</option>
                                    <option value="arrow-alt-circle-up">&#xf35b; arrow-alt-circle-up</option>
                                    <option value="bell">&#xf0f3; bell</option>
                                    <option value="bell-slash">&#xf1f6; bell-slash</option>
                                    <option value="bookmark">&#xf02e; bookmark</option>
                                    <option value="building">&#xf1ad; building</option>
                                    <option value="calendar">&#xf133; calendar</option>
                                    <option value="calendar-alt">&#xf073; calendar-alt</option>
                                    <option value="calendar-check">&#xf274; calendar-check</option>
                                    <option value="calendar-minus">&#xf272; calendar-minus</option>
                                    <option value="calendar-plus">&#xf271; calendar-plus</option>
                                    <option value="calendar-times">&#xf273; calendar-times</option>
                                    <option value="caret-square-down">&#xf150; caret-square-down</option>
                                    <option value="caret-square-left">&#xf191; caret-square-left</option>
                                    <option value="caret-square-right">&#xf152; caret-square-right</option>
                                    <option value="caret-square-up">&#xf151; caret-square-up</option>
                                    <option value="chart-bar">&#xf080; chart-bar</option>
                                    <option value="check-circle">&#xf058; check-circle</option>
                                    <option value="check-square">&#xf14a; check-square</option>
                                    <option value="circle">&#xf111; circle</option>
                                    <option value="clipboard">&#xf328; clipboard</option>
                                    <option value="clock">&#xf017; clock</option>
                                    <option value="clone">&#xf24d; clone</option>
                                    <option value="closed-captioning">&#xf20a; closed-captioning</option>
                                    <option value="comment">&#xf075; comment</option>
                                    <option value="comment-alt">&#xf27a; comment-alt</option>
                                    <option value="comment-dots">&#xf4ad; comment-dots</option>
                                    <option value="comments">&#xf086; comments</option>
                                    <option value="compass">&#xf14e; compass</option>
                                    <option value="copy">&#xf0c5; copy</option>
                                    <option value="copyright">&#xf1f9; copyright</option>
                                    <option value="credit-card">&#xf09d; credit-card</option>
                                    <option value="dizzy">&#xf567; dizzy</option>
                                    <option value="dot-circle">&#xf192; dot-circle</option>
                                    <option value="edit">&#xf044; edit</option>
                                    <option value="envelope">&#xf40e0; envelope </option>
                                    <option value="envelope-open">&#xf2b6; envelope-open</option>
                                    <option value="eye">&#xf06e; eye</option>
                                    <option value="eye-slash">&#xf070; eye-slash</option>
                                    <option value="file">&#xf15b; file</option>
                                    <option value="file-alt">&#xf15c; file-alt</option>
                                    <option value="file-archive">&#xf1c6; file-archive</option>
                                    <option value="file-audio">&#xf1c7; file-audio</option>
                                    <option value="file-code">&#xf1c9; file-code</option>
                                    <option value="file-excel">&#xf1c3; file-excel </option>
                                    <option value="file-image">&#xf1c5; file-image</option>
                                    <option value="file-pdf">&#xf1c1; file-pdf</option>
                                    <option value="file-powerpoint">&#xf1c4; file-powerpoint</option>
                                    <option value="file-video">&#xf1c8; file-video</option>
                                    <option value="file-word">&#xf1c2; file-word</option>
                                    <option value="flag">&#xf024; flag</option>
                                    <option value="flushed">&#xf579; flushed</option>
                                    <option value="folder">&#xf07b; folder</option>
                                    <option value="folder-open">&#xf07c; folder-open </option>
                                    <option value="frown">&#xf119; frown</option>
                                    <option value="frown-open">&#xf57a; frown-open</option>
                                    <option value="futbol">&#xf1e3; futbol</option>
                                    <option value="gem">&#xf3a5; gem</option>
                                    <option value="grimace">&#xf57f; grimace</option>
                                    <option value="grin">&#xf580; grin</option>
                                    <option value="grin-alt">&#xf581; grin-alt</option>
                                    <option value="grin-beam">&#xf582; grin-beam</option>
                                    <option value="grin-beam-sweet">&#xf583; grin-beam-sweet </option>
                                    <option value="grin-hearts">&#xf584; grin-hearts</option>
                                    <option value="grin-squint">&#xf585; grin-squint</option>
                                    <option value="grin-squint-tears">&#xf586; grin-squint-tears</option>
                                    <option value="grin-stars">&#xf587; grin-stars</option>
                                    <option value="grin-tears">&#xf588; grin-tears</option>
                                    <option value="grin-tongue">&#xf589; grin-tongue</option>
                                    <option value="grin-tongue-squint">&#xf58a; grin-tongue-squint</option>
                                    <option value="grin-tongue-wink">&#xf58b; grin-tongue-wink</option>
                                    <option value="grin-wink">&#xf58c; grin-wink </option>
                                    <option value="hand-lizard">&#xf258; hand-lizard</option>
                                    <option value="hand-paper">&#xf256; hand-paper</option>
                                    <option value="hand-peace">&#xf25b; hand-peace</option>
                                    <option value="hand-point-down">&#xf0a7; hand-point-down</option>
                                    <option value="hand-point-left">&#xf0a5; hand-point-left</option>
                                    <option value="hand-point-right">&#xf0a4; hand-point-right</option>
                                    <option value="hand-point-up">&#xf0a6; hand-point-up</option>
                                    <option value="hand-pointer">&#xf25a; hand-pointer</option>
                                    <option value="hand-rock">&#xf255; hand-rock </option>
                                    <option value="hand-scissors">&#xf257; hand-scissors</option>
                                    <option value="hand-spock">&#xf259; hand-spock</option>
                                    <option value="handshake">&#xf2b5; handshake</option>
                                    <option value="hdd">&#xf0a0; hdd</option>
                                    <option value="heart">&#xf004; heart</option>
                                    <option value="home">&#xf015; home</option>
                                    <option value="hospital">&#xf0f8; hospital</option>
                                    <option value="hourglass">&#xf254; hourglass</option>
                                    <option value="id-badge">&#xf2c1; id-badge</option>
                                    <option value="id-card">&#xf2c2; id-card </option>
                                    <option value="image">&#xf03e; image</option>
                                    <option value="images">&#xf302; images</option>
                                    <option value="keyboard">&#xf11c; keyboard</option>
                                    <option value="kiss">&#xf596; kiss</option>
                                    <option value="kiss-beam">&#xf597; kiss-beam</option>
                                    <option value="kiss-wink-heart">&#xf598; kiss-wink-heart</option>
                                    <option value="laugh">&#xf599; laugh</option>
                                    <option value="laugh-beam">&#xf59a; laugh-beam</option>
                                    <option value="laugh-squint">&#xf59b; laugh-squint </option>
                                    <option value="laugh-wink">&#xf59c; laugh-wink</option>
                                    <option value="lemon">&#xf094; lemon</option>
                                    <option value="life-ring">&#xf1cd; life-ring</option>
                                    <option value="lightbulb">&#xf0eb; lightbulb</option>
                                    <option value="list-alt">&#xf022; list-alt</option>
                                    <option value="map">&#xf279; map</option>
                                    <option value="meh">&#xf11a; meh</option>
                                    <option value="meh-blank">&#xf5a4; meh-blank</option>
                                    <option value="meh-rolling-eyes">&#xf5a5; meh-rolling-eyes </option>
                                    <option value="minus-square">&#xf146; minus-square</option>
                                    <option value="money-bill-alt">&#xf3d1; money-bill-alt</option>
                                    <option value="moon">&#xf186; moon</option>
                                    <option value="newspaper">&#xf1ea; newspaper</option>
                                    <option value="object-group">&#xf247; object-group</option>
                                    <option value="object-upgroup">&#xf248; object-upgroup</option>
                                    <option value="paper-plane">&#xf1d8; paper-plane</option>
                                    <option value="pause-circle">&#xf28b; pause-circle</option>
                                    <option value="play-circle">&#xf144; play-circle </option>
                                    <option value="plus-square">&#xf0fe; plus-square</option>
                                    <option value="question-circle">&#xf059; question-circle</option>
                                    <option value="registered">&#xf25d; registered</option>
                                    <option value="sad-cry">&#xf5b3; sad-cry</option>
                                    <option value="sad-tear">&#xf5b4; sad-tear</option>
                                    <option value="save">&#xf0c7; save</option>
                                    <option value="share-square">&#xf14d; share-square</option>
                                    <option value="smile">&#xf118; smile</option>
                                    <option value="smile-beam">&#xf5b8; smile-beam </option>
                                    <option value="smile-wink">&#xf4da; smile-wink</option>
                                    <option value="snowflake">&#xf2dc; snowflake</option>
                                    <option value="square">&#xf0c8; square</option>
                                    <option value="star">&#xf005; star</option>
                                    <option value="star-half">&#xf089; star-half</option>
                                    <option value="sticky-note">&#xf249; sticky-note</option>
                                    <option value="stop-circle">&#xf28d; stop-circle</option>
                                    <option value="sun">&#xf185; sun</option>
                                    <option value="surprise">&#xf5c2; surprise </option>
                                    <option value="thumbs-down">&#xf165; thumbs-down</option>
                                    <option value="thumbs-up">&#xf1164; thumbs-up</option>
                                    <option value="times-circle">&#xf057; times-circle</option>
                                    <option value="tired">&#xf5c8; tired</option>
                                    <option value="trash-alt">&#xf2ed; trash-alt</option>
                                    <option value="user">&#xf007; user</option>
                                    <option value="user-circle">&#xf2bd; user-circle</option>
                                    <option value="window-close">&#xf410; window-close</option>
                                    <option value="window-maximize">&#xf2d0; window-maximize </option>
                                    <option value="window-minimize">&#xf2d1; window-minimize</option>
                                    <option value="window-restore">&#xf2d2; window-restore</option>                                         
                            </select>                       
                </div>      
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_module"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
            </div>
        </div>
    </div>
</div>
<!--End EditModuleModal -->

<!--Begin ListOperationModal-->

<div class="modal fade animate__animated animate__bounce" id="ListOperationModal" tabindex="-1" role="dialog" aria-labelledby="listtitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="listtitleModalLabel" style="color: white;">Módulo: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="listform" name="listform" class="form-horizontal" role="form">                
                <ul id="listform_errList"></ul>               
                <input type="hidden" id="list_module_id">
                <div class="card">
                     <div class="card-body"> 
                            <fieldset>
                                <legend>Operações vinculadas:</legend>
                                <div class="form-check">                                    
                                    @foreach ($operations as $operation)
                                    <label class="form-check-label" for="check{{$operation->id}}">
                                        <input type="checkbox" id="check{{$operation->id}}" name="operations[]" value="{{$operation->id}}" class="form-check-input"> {{$operation->name}}
                                    </label><br>
                                    @endforeach
                                </div>
                            </fieldset>   
                     </div>
                </div>                  
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_listoperation"><img id="imglist" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!--End ListOperationModal -->

<!--index-->
{{-- @auth
@if(!(auth()->user()->inativo)) --}}
<div class="container-fluid py-5">   
    <div id="success_message"></div>    
    <section class="border p-4 mb-4 d-flex align-items-left">    
    <form action="{{route('admin.modules.index')}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome do módulo" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none;">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddModuleModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none;">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="sidebar-dark-primary elevation-4" style="color: white">
                            <tr>                                
                                <th scope="col">MÓDULOS</th>
                                <th scope="col">OPERAÇÕES</th>                    
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_modulos">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($modules as $module)   
                            <tr id="modulo{{$module->id}}">                                
                                <th scope="row"><i class="fas fa-{{$module->icone}}"></i> {{$module->name}}</th>
                                <td>
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$module->id}}" data-name="{{$module->name}}" class="list_operations_btn" style="background:transparent;border:none;"><i id="ico_list{{$module->id}}" class="fas fa-list"></i><img id="img_list{{$module->id}}" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"></button>
                                        </div>    
                                </td>
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$module->id}}" class="edit_module fas fa-edit" style="background:transparent;border:none;"></button>
                                            <button type="button" data-id="{{$module->id}}" data-name="{{$module->name}}" class="delete_module_btn fas fa-trash" style="background:transparent;border:none;"></button>
                                        </div>                                    
                                </td>
                            </tr>  
                            @empty
                            <tr id="nadaencontrado">
                                <td colspan="4">Nada Encontrado!</td>
                            </tr>                      
                            @endforelse                                                    
                        </tbody>
                    </table> 
                    <div class="d-flex hover justify-content-center">
                    {{$modules->links()}}
                    </div>  
   
    </div>        
    
</div> 
{{-- @else 
  <i class="fas fa-lock"></i><b class="title"> USUÁRIO INATIVO OU NÃO LIBERADO! CONTACTE O ADMINISTRADOR.</b>
@endif
@endauth --}}
<!--End Index-->

@endsection
@section('scripts')

<script type="text/javascript">

$(document).ready(function(){        
    
        $(document).on('click','.delete_module_btn',function(e){   ///inicio delete 
            e.preventDefault();           
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");            
            var nome = $(this).data("name");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:nome,
                text: "Deseja excluir?",
                imageUrl: '../../logoprodap.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'imagem do prodap',
                showCancelButton: true,
                confirmButtonText: 'Sim, prossiga!',                
                cancelButtonText: 'Não, cancelar!',                                 
             }).then((result)=>{
             if(result.isConfirmed){             
                $.ajax({
                    url: '/admin/modules/delete-module/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,
                        '_method': 'DELETE',                    
                        '_token':CSRF_TOKEN,
                    },
                    success:function(response){
                        if(response.status==200){                        
                            //remove linha correspondente da tabela html
                            $("#modulo"+id).remove();     
                            $('#success_message').replaceWith('<div id="success_message"></div>');                       
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);         
                        }else{
                            //Não pôde excluir por causa dos relacionamentos    
                            $('#success_message').replaceWith('<div id="success_message"></div>');                        
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);         
                        }
                    }
                });            
            }  
        });
      
        });  ///fim delete 
        //início da exibição do form
        $('#EditModuleModal').on('shown.bs.modal',function(){
            $('#edit_name').focus();
        });
        $(document).on('click','.edit_module',function(e){  
            e.preventDefault();
            
            var id = $(this).data("id");                                   
            $('#editmyform').trigger('reset');
            $('#EditModuleModal').modal('show');          
            $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/admin/modules/edit-module/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $('.name').val(response.module.name);
                        $('#edit_module_id').val(response.module.id);
                        $('.edit_icone').replaceWith('<select name="editicone" id="editicone" class="edit_icone custom-select">\
                                    <option value="address-book" '+(response.module.icone=='address-book' ? 'selected' : '')+'>&#xf2b9; address-book</option>\
                                    <option value="address-card" '+(response.module.icone=='address-card' ? 'selected' : '')+'>&#xf2bb; address-card</option>\
                                    <option value="angry" '+(response.module.icone=='angry' ? 'selected' : '')+'>&#xf556; angry</option>\
                                    <option value="arrow-alt-circle-down" '+(response.module.icone=='arrow-alt-circle-down' ? 'selected' : '')+'>&#xf358; arrow-alt-circle-down</option>\
                                    <option value="arrow-alt-circle-left" '+(response.module.icone=='arrow-alt-circle-left' ? 'selected' : '')+'>&#xf359; arrow-alt-circle-left</option>\
                                    <option value="arrow-alt-circle-right" '+(response.module.icone=='arrow-alt-circle-right' ? 'selected' : '')+'>&#xf35a; arrow-alt-circle-right</option>\
                                    <option value="arrow-alt-circle-up" '+(response.module.icone=='arrow-alt-circle-up' ? 'selected' : '')+'>&#xf35b; arrow-alt-circle-up</option>\
                                    <option value="bell" '+(response.module.icone=='bell' ? 'selected' : '')+'>&#xf0f3; bell</option>\
                                    <option value="bell-slash" '+(response.module.icone=='bell-slash' ? 'selected' : '')+'>&#xf1f6; bell-slash</option>\
                                    <option value="bookmark" '+(response.module.icone=='bookmark' ? 'selected' : '')+'>&#xf02e; bookmark</option>\
                                    <option value="building" '+(response.module.icone=='building' ? 'selected' : '')+'>&#xf1ad; building</option>\
                                    <option value="calendar" '+(response.module.icone=='calendar' ? 'selected' : '')+'>&#xf133; calendar</option>\
                                    <option value="calendar-alt" '+(response.module.icone=='calendar-alt' ? 'selected' : '')+'>&#xf073; calendar-alt</option>\
                                    <option value="calendar-check" '+(response.module.icone=='calendar-check' ? 'selected' : '')+'>&#xf274; calendar-check</option>\
                                    <option value="calendar-minus" '+(response.module.icone=='calendar-minus' ? 'selected' : '')+'>&#xf272; calendar-minus</option>\
                                    <option value="calendar-plus" '+(response.module.icone=='calendar-plus' ? 'selected' : '')+'>&#xf271; calendar-plus</option>\
                                    <option value="calendar-times" '+(response.module.icone=='calendar-times' ? 'selected' : '')+'>&#xf273; calendar-times</option>\
                                    <option value="caret-square-down" '+(response.module.icone=='caret-square-down' ? 'selected' : '')+'>&#xf150; caret-square-down</option>\
                                    <option value="caret-square-left" '+(response.module.icone=='caret-square-left' ? 'selected' : '')+'>&#xf191; caret-square-left</option>\
                                    <option value="caret-square-right" '+(response.module.icone=='caret-square-right' ? 'selected' : '')+'>&#xf152; caret-square-right</option>\
                                    <option value="caret-square-up" '+(response.module.icone=='caret-square-up' ? 'selected' : '')+'>&#xf151; caret-square-up</option>\
                                    <option value="chart-bar" '+(response.module.icone=='chart-bar' ? 'selected' : '')+'>&#xf080; chart-bar</option>\
                                    <option value="check-circle" '+(response.module.icone=='check-circle' ? 'selected' : '')+'>&#xf058; check-circle</option>\
                                    <option value="check-square" '+(response.module.icone=='check-square' ? 'selected' : '')+'>&#xf14a; check-square</option>\
                                    <option value="circle" '+(response.module.icone=='circle' ? 'selected' : '')+'>&#xf111; circle</option>\
                                    <option value="clipboard" '+(response.module.icone=='clipboard' ? 'selected' : '')+'>&#xf328; clipboard</option>\
                                    <option value="clock" '+(response.module.icone=='clock' ? 'selected' : '')+'>&#xf017; clock</option>\
                                    <option value="clone" '+(response.module.icone=='clone' ? 'selected' : '')+'>&#xf24d; clone</option>\
                                    <option value="closed-captioning" '+(response.module.icone=='closed-captioning' ? 'selected' : '')+'>&#xf20a; closed-captioning</option>\
                                    <option value="comment" '+(response.module.icone=='comment' ? 'selected' : '')+'>&#xf075; comment</option>\
                                    <option value="comment-alt" '+(response.module.icone=='comment-alt' ? 'selected' : '')+'>&#xf27a; comment-alt</option>\
                                    <option value="comment-dots" '+(response.module.icone=='comment-dots' ? 'selected' : '')+'>&#xf4ad; comment-dots</option>\
                                    <option value="comments" '+(response.module.icone=='comments' ? 'selected' : '')+'>&#xf086; comments</option>\
                                    <option value="compass" '+(response.module.icone=='compass' ? 'selected' : '')+'>&#xf14e; compass</option>\
                                    <option value="copy" '+(response.module.icone=='copy' ? 'selected' : '')+'>&#xf0c5; copy</option>\
                                    <option value="copyright" '+(response.module.icone=='copyright' ? 'selected' : '')+'>&#xf1f9; copyright</option>\
                                    <option value="credit-card" '+(response.module.icone=='credit-card' ? 'selected' : '')+'>&#xf09d; credit-card</option>\
                                    <option value="dizzy" '+(response.module.icone=='dizzy' ? 'selected' : '')+'>&#xf567; dizzy</option>\
                                    <option value="dot-circle" '+(response.module.icone=='dot-circle' ? 'selected' : '')+'>&#xf192; dot-circle</option>\
                                    <option value="edit" '+(response.module.icone=='edit' ? 'selected' : '')+'>&#xf044; edit</option>\
                                    <option value="envelope" '+(response.module.icone=='envelope' ? 'selected' : '')+'>&#xf40e0; envelope </option>\
                                    <option value="envelope-open" '+(response.module.icone=='envelope-open' ? 'selected' : '')+'>&#xf2b6; envelope-open</option>\
                                    <option value="eye" '+(response.module.icone=='eye' ? 'selected' : '')+'>&#xf06e; eye</option>\
                                    <option value="eye-slash" '+(response.module.icone=='eye-slash' ? 'selected' : '')+'>&#xf070; eye-slash</option>\
                                    <option value="file" '+(response.module.icone=='file' ? 'selected' : '')+'>&#xf15b; file</option>\
                                    <option value="file-alt" '+(response.module.icone=='file-alt' ? 'selected' : '')+'>&#xf15c; file-alt</option>\
                                    <option value="file-archive" '+(response.module.icone=='file-archive' ? 'selected' : '')+'>&#xf1c6; file-archive</option>\
                                    <option value="file-audio" '+(response.module.icone=='file-audio' ? 'selected' : '')+'>&#xf1c7; file-audio</option>\
                                    <option value="file-code" '+(response.module.icone=='file-code' ? 'selected' : '')+'>&#xf1c9; file-code</option>\
                                    <option value="file-excel" '+(response.module.icone=='file-excel' ? 'selected' : '')+'>&#xf1c3; file-excel </option>\
                                    <option value="file-image" '+(response.module.icone=='file-image' ? 'selected' : '')+'>&#xf1c5; file-image</option>\
                                    <option value="file-pdf" '+(response.module.icone=='file-pdf' ? 'selected' : '')+'>&#xf1c1; file-pdf</option>\
                                    <option value="file-powerpoint" '+(response.module.icone=='file-powerpoint' ? 'selected' : '')+'>&#xf1c4; file-powerpoint</option>\
                                    <option value="file-video" '+(response.module.icone=='file-video' ? 'selected' : '')+'>&#xf1c8; file-video</option>\
                                    <option value="file-word" '+(response.module.icone=='file-word' ? 'selected' : '')+'>&#xf1c2; file-word</option>\
                                    <option value="flag" '+(response.module.icone=='flag' ? 'selected' : '')+'>&#xf024; flag</option>\
                                    <option value="flushed" '+(response.module.icone=='flushed' ? 'selected' : '')+'>&#xf579; flushed</option>\
                                    <option value="folder" '+(response.module.icone=='folder' ? 'selected' : '')+'>&#xf07b; folder</option>\
                                    <option value="folder-open" '+(response.module.icone=='folder-open' ? 'selected' : '')+'>&#xf07c; folder-open </option>\
                                    <option value="frown" '+(response.module.icone=='frown' ? 'selected' : '')+'>&#xf119; frown</option>\
                                    <option value="frown-open" '+(response.module.icone=='frown-open' ? 'selected' : '')+'>&#xf57a; frown-open</option>\
                                    <option value="futbol" '+(response.module.icone=='futbol' ? 'selected' : '')+'>&#xf1e3; futbol</option>\
                                    <option value="gem" '+(response.module.icone=='gem' ? 'selected' : '')+'>&#xf3a5; gem</option>\
                                    <option value="grimace" '+(response.module.icone=='grimace' ? 'selected' : '')+'>&#xf57f; grimace</option>\
                                    <option value="grin" '+(response.module.icone=='grin' ? 'selected' : '')+'>&#xf580; grin</option>\
                                    <option value="grin-alt" '+(response.module.icone=='grin-alt' ? 'selected' : '')+'>&#xf581; grin-alt</option>\
                                    <option value="grin-beam" '+(response.module.icone=='grin-beam' ? 'selected' : '')+'>&#xf582; grin-beam</option>\
                                    <option value="grin-beam-sweet" '+(response.module.icone=='grin-beam-sweet' ? 'selected' : '')+'>&#xf583; grin-beam-sweet </option>\
                                    <option value="grin-hearts" '+(response.module.icone=='grin-hearts' ? 'selected' : '')+'>&#xf584; grin-hearts</option>\
                                    <option value="grin-squint" '+(response.module.icone=='grin-squint' ? 'selected' : '')+'>&#xf585; grin-squint</option>\
                                    <option value="grin-squint-tears" '+(response.module.icone=='grin-squint-tears' ? 'selected' : '')+'>&#xf586; grin-squint-tears</option>\
                                    <option value="grin-stars" '+(response.module.icone=='grin-stars' ? 'selected' : '')+'>&#xf587; grin-stars</option>\
                                    <option value="grin-tears" '+(response.module.icone=='grin-tears' ? 'selected' : '')+'>&#xf588; grin-tears</option>\
                                    <option value="grin-tongue" '+(response.module.icone=='grin-tongue' ? 'selected' : '')+'>&#xf589; grin-tongue</option>\
                                    <option value="grin-tongue-squint" '+(response.module.icone=='grin-tongue-squint' ? 'selected' : '')+'>&#xf58a; grin-tongue-squint</option>\
                                    <option value="grin-tongue-wink" '+(response.module.icone=='grin-tonque-wink' ? 'selected' : '')+'>&#xf58b; grin-tongue-wink</option>\
                                    <option value="grin-wink" '+(response.module.icone=='grin-wink' ? 'selected' : '')+'>&#xf58c; grin-wink </option>\
                                    <option value="hand-lizard" '+(response.module.icone=='hand-lizard' ? 'selected' : '')+'>&#xf258; hand-lizard</option>\
                                    <option value="hand-paper" '+(response.module.icone=='hand-paper' ? 'selected' : '')+'>&#xf256; hand-paper</option>\
                                    <option value="hand-peace" '+(response.module.icone=='hand-peace' ? 'selected' : '')+'>&#xf25b; hand-peace</option>\
                                    <option value="hand-point-down" '+(response.module.icone=='hand-point-down' ? 'selected' : '')+'>&#xf0a7; hand-point-down</option>\
                                    <option value="hand-point-left" '+(response.module.icone=='hand-point-left' ? 'selected' : '')+'>&#xf0a5; hand-point-left</option>\
                                    <option value="hand-point-right" '+(response.module.icone=='hand-point-right' ? 'selected' : '')+'>&#xf0a4; hand-point-right</option>\
                                    <option value="hand-point-up" '+(response.module.icone=='hand-point-up' ? 'selected' : '')+'>&#xf0a6; hand-point-up</option>\
                                    <option value="hand-pointer" '+(response.module.icone=='hand-pointer' ? 'selected' : '')+'>&#xf25a; hand-pointer</option>\
                                    <option value="hand-rock" '+(response.module.icone=='hand-rock' ? 'selected' : '')+'>&#xf255; hand-rock </option>\
                                    <option value="hand-scissors" '+(response.module.icone=='hand-scissors' ? 'selected' : '')+'>&#xf257; hand-scissors</option>\
                                    <option value="hand-spock" '+(response.module.icone=='hand-spock' ? 'selected' : '')+'>&#xf259; hand-spock</option>\
                                    <option value="handshake" '+(response.module.icone=='handshake' ? 'selected' : '')+'>&#xf2b5; handshake</option>\
                                    <option value="hdd" '+(response.module.icone=='hdd' ? 'selected' : '')+'>&#xf0a0; hdd</option>\
                                    <option value="heart" '+(response.module.icone=='heart' ? 'selected' : '')+'>&#xf004; heart</option>\
                                    <option value="home" '+(response.module.icone=='home' ? 'selected' : '')+'>&#xf015; home</option>\
                                    <option value="hospital" '+(response.module.icone=='hospital' ? 'selected' : '')+'>&#xf0f8; hospital</option>\
                                    <option value="hourglass" '+(response.module.icone=='hourglass' ? 'selected' : '')+'>&#xf254; hourglass</option>\
                                    <option value="id-badge" '+(response.module.icone=='id-badge' ? 'selected' : '')+'>&#xf2c1; id-badge</option>\
                                    <option value="id-card" '+(response.module.icone=='id-card' ? 'selected' : '')+'>&#xf2c2; id-card </option>\
                                    <option value="image" '+(response.module.icone=='image' ? 'selected' : '')+'>&#xf03e; image</option>\
                                    <option value="images" '+(response.module.icone=='images' ? 'selected' : '')+'>&#xf302; images</option>\
                                    <option value="keyboard" '+(response.module.icone=='keyboard' ? 'selected' : '')+'>&#xf11c; keyboard</option>\
                                    <option value="kiss" '+(response.module.icone=='kiss' ? 'selected' : '')+'>&#xf596; kiss</option>\
                                    <option value="kiss-beam" '+(response.module.icone=='kiss-beam' ? 'selected' : '')+'>&#xf597; kiss-beam</option>\
                                    <option value="kiss-wink-heart" '+(response.module.icone=='kiss-wink-heart' ? 'selected' : '')+'>&#xf598; kiss-wink-heart</option>\
                                    <option value="laugh" '+(response.module.icone=='laugh' ? 'selected' : '')+'>&#xf599; laugh</option>\
                                    <option value="laugh-beam" '+(response.module.icone=='laugh-beam' ? 'selected' : '')+'>&#xf59a; laugh-beam</option>\
                                    <option value="laugh-squint" '+(response.module.icone=='laugh-squint' ? 'selected' : '')+'>&#xf59b; laugh-squint </option>\
                                    <option value="laugh-wink" '+(response.module.icone=='laugh-wink' ? 'selected' : '')+'>&#xf59c; laugh-wink</option>\
                                    <option value="lemon" '+(response.module.icone=='lemon' ? 'selected' : '')+'>&#xf094; lemon</option>\
                                    <option value="life-ring" '+(response.module.icone=='life-ring' ? 'selected' : '')+'>&#xf1cd; life-ring</option>\
                                    <option value="lightbulb" '+(response.module.icone=='lightbulb' ? 'selected' : '')+'>&#xf0eb; lightbulb</option>\
                                    <option value="list-alt" '+(response.module.icone=='list-alt' ? 'selected' : '')+'>&#xf022; list-alt</option>\
                                    <option value="map" '+(response.module.icone=='map' ? 'selected' : '')+'>&#xf279; map</option>\
                                    <option value="meh" '+(response.module.icone=='meh' ? 'selected' : '')+'>&#xf11a; meh</option>\
                                    <option value="meh-blank" '+(response.module.icone=='meh-blank' ? 'selected' : '')+'>&#xf5a4; meh-blank</option>\
                                    <option value="meh-rolling-eyes" '+(response.module.icone=='meh-rolling-eyes' ? 'selected' : '')+'>&#xf5a5; meh-rolling-eyes </option>\
                                    <option value="minus-square" '+(response.module.icone=='minus-square' ? 'selected' : '')+'>&#xf146; minus-square</option>\
                                    <option value="money-bill-alt" '+(response.module.icone=='money-bill-alt' ? 'selected' : '')+'>&#xf3d1; money-bill-alt</option>\
                                    <option value="moon" '+(response.module.icone=='moon' ? 'selected' : '')+'>&#xf186; moon</option>\
                                    <option value="newspaper" '+(response.module.icone=='newspaper' ? 'selected' : '')+'>&#xf1ea; newspaper</option>\
                                    <option value="object-group" '+(response.module.icone=='object-group' ? 'selected' : '')+'>&#xf247; object-group</option>\
                                    <option value="object-upgroup" '+(response.module.icone=='object-upgroup' ? 'selected' : '')+'>&#xf248; object-upgroup</option>\
                                    <option value="paper-plane" '+(response.module.icone=='paper-plane' ? 'selected' : '')+'>&#xf1d8; paper-plane</option>\
                                    <option value="pause-circle" '+(response.module.icone=='pause-circle' ? 'selected' : '')+'>&#xf28b; pause-circle</option>\
                                    <option value="play-circle" '+(response.module.icone=='play-circle' ? 'selected' : '')+'>&#xf144; play-circle </option>\
                                    <option value="plus-square" '+(response.module.icone=='plus-square' ? 'selected' : '')+'>&#xf0fe; plus-square</option>\
                                    <option value="question-circle" '+(response.module.icone=='question-circle' ? 'selected' : '')+'>&#xf059; question-circle</option>\
                                    <option value="registered" '+(response.module.icone=='registered' ? 'selected' : '')+'>&#xf25d; registered</option>\
                                    <option value="sad-cry" '+(response.module.icone=='sad-cry' ? 'selected' : '')+'>&#xf5b3; sad-cry</option>\
                                    <option value="sad-tear" '+(response.module.icone=='sad-tear' ? 'selected' : '')+'>&#xf5b4; sad-tear</option>\
                                    <option value="save" '+(response.module.icone=='save' ? 'selected' : '')+'>&#xf0c7; save</option>\
                                    <option value="share-square" '+(response.module.icone=='share-square' ? 'selected' : '')+'>&#xf14d; share-square</option>\
                                    <option value="smile" '+(response.module.icone=='smile' ? 'selected' : '')+'>&#xf118; smile</option>\
                                    <option value="smile-beam" '+(response.module.icone=='smile-beam' ? 'selected' : '')+'>&#xf5b8; smile-beam </option>\
                                    <option value="smile-wink" '+(response.module.icone=='smile-wink' ? 'selected' : '')+'>&#xf4da; smile-wink</option>\
                                    <option value="snowflake" '+(response.module.icone=='snowflake' ? 'selected' : '')+'>&#xf2dc; snowflake</option>\
                                    <option value="square" '+(response.module.icone=='square' ? 'selected' : '')+'>&#xf0c8; square</option>\
                                    <option value="star" '+(response.module.icone=='star' ? 'selected' : '')+'>&#xf005; star</option>\
                                    <option value="star-half" '+(response.module.icone=='star-half' ? 'selected' : '')+'>&#xf089; star-half</option>\
                                    <option value="sticky-note" '+(response.module.icone=='sticky-note' ? 'selected' : '')+'>&#xf249; sticky-note</option>\
                                    <option value="stop-circle" '+(response.module.icone=='stop-circle' ? 'selected' : '')+'>&#xf28d; stop-circle</option>\
                                    <option value="sun" '+(response.module.icone=='sun' ? 'selected' : '')+'>&#xf185; sun</option>\
                                    <option value="surprise" '+(response.module.icone=='surprise' ? 'selected' : '')+'>&#xf5c2; surprise </option>\
                                    <option value="thumbs-down" '+(response.module.icone=='thumbs-down' ? 'selected' : '')+'>&#xf165; thumbs-down</option>\
                                    <option value="thumbs-up" '+(response.module.icone=='thumbs-up' ? 'selected' : '')+'>&#xf1164; thumbs-up</option>\
                                    <option value="times-circle" '+(response.module.icone=='times-circle' ? 'selected' : '')+'>&#xf057; times-circle</option>\
                                    <option value="tired" '+(response.module.icone=='tired' ? 'selected' : '')+'>&#xf5c8; tired</option>\
                                    <option value="trash-alt" '+(response.module.icone=='trash-alt' ? 'selected' : '')+'>&#xf2ed; trash-alt</option>\
                                    <option value="user" '+(response.module.icone=='user' ? 'selected' : '')+'>&#xf007; user</option>\
                                    <option value="user-circle" '+(response.module.icone=='user-circle' ? 'selected' : '')+'>&#xf2bd; user-circle</option>\
                                    <option value="window-close" '+(response.module.icone=='window-close' ? 'selected' : '')+'>&#xf410; window-close</option>\
                                    <option value="window-maximize" '+(response.module.icone=='window-maximize' ? 'selected' : '')+'>&#xf2d0; window-maximize </option>\
                                    <option value="window-minimize" '+(response.module.icone=='window-minimize' ? 'selected' : '')+'>&#xf2d1; window-minimize</option>\
                                    <option value="window-restore" '+(response.module.icone=='window-restore' ? 'selected' : '')+'>&#xf2d2; window-restore</option>\
                            </select>');
                    }      
                }
            });
    
        }); //fim da da exibição do form de edição
    
        $(document).on('click','.update_module',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            var loading = $('#imgedit');
                loading.show();
    
            var id = $('#edit_module_id').val();        
    
            var data = {
                'name' : $('#edit_name').val(),
                'icone': $('#editicone').val(),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({     
                type: 'POST',                          
                data: data,
                dataType: 'json',    
                url: '/admin/modules/update-module/'+id,         
                success: function(response){                                                    
                    if(response.status==400){
                        //erros
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        });
    
                        loading.hide();
    
                    } else if(response.status==404){
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');    
                        $('#success_message').replaceWith('<div id="success_message"></div>');             
                        $('#success_message').addClass('alert alert-warning');
                        $('#success_message').text(response.message);
                        loading.hide();
    
                    } else {
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');      
                        $('#success_message').replaceWith('<div id="success_message"></div>');                 
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        loading.hide();
    
                        $('editmyform').trigger('reset');
                        $('#EditModuleModal').modal('hide');                  
                        
                        //atualizando a linha na tabela html                      
                            var link = "{{asset('')}}"+"storage/ajax-loader.gif"; 
                            var linha = '<tr id="modulo'+response.module.id+'">\
                                    <th scope="row"><i class="fas fa-'+response.module.icone+'"></i> '+response.module.name+'</th>\
                                    <td>\
                                        <div class="btn-group">\
                                            <button type="button" data-id="'+response.module.id+'" data-name="'+response.module.name+'" class="list_operations_btn" style="background:transparent;border:none;"><i id="ico_list'+response.module.id+'" class="fas fa-list"></i><img id="img_list'+response.module.id+'" src="'+link+'" style="display: none;" class="rounded-circle" width="20"></button>\
                                        </div>\
                                    </td>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.module.id+'" class="edit_module fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.module.id+'" data-name="'+response.module.name+'" class="delete_module_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';                             
                        $("#modulo"+id).replaceWith(linha);                                                                                
    
                    }
                }
            });    
    
        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $('#AddModuleModal').on('shown.bs.modal',function(){
            $('.name').focus();
        });
        $(document).on('click','.AddModuleModal_btn',function(e){  //início da exibição do form
            e.preventDefault();       
            
            $('#addmyform').trigger('reset');
            $('#AddModuleModal').modal('show'); 
            $('#saveform_errList').html('<ul id="saveform_errList"></ul>');                       
    
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_module',function(e){ //início da adição de Registro
            e.preventDefault();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            var loading = $('#imgadd');
                loading.show();

            var data = {
                'name': $('.name').val(),
                'icone':$('.icone').val(),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            } 
            
            $.ajax({
                type: 'POST',
                url: '/admin/modules/add-module',
                data: data,
                dataType: 'json',
                success: function(response){
                    if(response.status==400){
                        $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                        loading.hide();
                    } else {
                        $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');     
                        $('#success_message').replaceWith('<div id="success_message"></div>');              
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);                                        

                        loading.hide();
                        $('#addmyform').trigger('reset');                    
                        $('#AddModuleModal').modal('hide');
    
                        //adiciona a linha na tabela html                      
                        var link = "{{asset('')}}"+"storage/ajax-loader.gif";    
                        var tupla = "";
                        var linha0 = "";
                        var linha1 = "";
                            linha0 = '<tr id="novo" style="display:none;"></tr>';
                            linha1 = '<tr id="modulo'+response.module.id+'">\
                                    <th scope="row"><i class="fas fa-'+response.module.icone+'"></i> '+response.module.name+'</th>\
                                    <td>\
                                        <div class="btn-group">\
                                            <button type="button" data-id="'+response.module.id+'" data-name="'+response.module.name+'" class="list_operations_btn" style="background:transparent;border:none;"><i id="ico_list'+response.module.id+'" class="fas fa-list"></i><img id="img_list'+response.module.id+'" src="'+link+'" style="display: none;" class="rounded-circle" width="20"></button>\
                                        </div>\
                                    </td>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.module.id+'" class="edit_module fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.module.id+'" data-name="'+response.module.name+'" class="delete_module_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';
                        if(!$('#nadaencontrado').html==""){
                            $('#nadaencontrado').remove();
                        }
                        tupla = linha0+linha1;                             
                        $("#novo").replaceWith(tupla);                                                     
                        
                    }
                    
                }
            });
    
        }); //Fim da adição de registro

        ///inicio lista de operações
        $(document).on('click','.list_operations_btn',function(e){
            e.preventDefault();

            var id = $(this).data("id");                            
                     $('#ico_list'+id).replaceWith('<i id="ico_list'+id+'"></i>');
            var loading = $('#img_list'+id);
                loading.show();

            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/admin/modules/list-operations/'+id,                                
                success: function(response){
                    if(response.status==200){
                        $('#list_module_id').val(response.module.id);      

                        $("input[name='operations[]']").attr('checked',false);                        
                        $.each(response.operations,function(key,values){                                                        
                                $("#check"+values.id).attr('checked',true);
                        });
                        $('#listform').trigger('reset');
                        $('#ListOperationModal').modal('show');
                        $('#listtitleModalLabel').replaceWith('<h5 class="modal-title" id="listtitleModalLabel" style="color: white;">Módulo: '+response.module.name+'</h5>');
                        loading.hide();
                        $('#ico_list'+id).replaceWith('<i id="ico_list'+id+'" class="fas fa-list"></i>');
                    }
                }
            });
        });

        $(document).on('click','.update_listoperation',function(e){
            e.preventDefault();
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var loading = $('#imglist');
                loading.show();
            var id = $('#list_module_id').val();
            var operations = new Array;
                        $("input[name='operations[]']:checked").each(function(){                
                            operations.push($(this).val());
                        });   
            var data = {
                'id':id,
                'operacoes':operations,
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            $.ajax({
                url:'/admin/modules/store-operations/'+id,
                type:'POST',
                dataType:'json',
                data:data,
                success:function(response){
                    if(response.status==200){                      
                        $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');     
                        $('#success_message').replaceWith('<div id="success_message"></div>');              
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);                                        

                        loading.hide();
                        $('#listmyform').trigger('reset');                    
                        $('#ListOperationModal').modal('hide');
                    }
                }
            });
        });

        ///fim lista de operações
    
    }); ///Fim do escopo do script
    
    </script>
@stop