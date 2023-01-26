@extends('layouts.master')

@section('content')

<style>
.custom-select {
    font-family: 'Lato', 'Font Awesome 5 Free', 'Font Awesome 5 Brands';
    font-weight: 900;
}
</style>


<!--AddOperationModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddOperationModal" tabindex="-1" role="dialog" aria-labelledby="addtitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="addtitleModalLabel" style="color: white;">Adicionar Operações</h5>
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
                <button type="button" class="btn btn-primary add_operation"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddOperationModal-->

<!--EditOperationModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="EditOperationModal" tabindex="-1" role="dialog" aria-labelledby="edittitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="edittitleModalLabel" style="color: white;">Editar e atualizar Operação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editmyform" name="editmyform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>               
                <input type="hidden" id="edit_operation_id">
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" id="edit_name" class="name form-control">
                </div>   
                <div class="form-group mb-3">                    
                           <div class="form-group">
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
                </div>      
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_operation"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
            </div>
        </div>
    </div>
</div>

<!--index-->
{{-- @auth
@if(!(auth()->user()->inativo)) --}}
<div class="container-fluid py-5">   
    <div id="success_message"></div>    
    <section class="border p-4 mb-4 d-flex align-items-left">    
    <form action="{{route('admin.operations.index')}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome da operação" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddOperationModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="sidebar-dark-primary elevation-4" style="color: white">
                            <tr>                                
                                <th scope="col">OPERAÇÕES</th>                    
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_operacoes">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($operations as $operation)   
                            <tr id="operacao{{$operation->id}}">                                
                                <th scope="row"><i class="fas fa-{{$operation->icone}}"></i> {{$operation->name}}</th>                                
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$operation->id}}" class="edit_operation fas fa-edit" style="background:transparent;border:none;"></button>
                                            <button type="button" data-id="{{$operation->id}}" data-name="{{$operation->name}}" class="delete_operation_btn fas fa-trash" style="background:transparent;border:none;"></button>
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
                    {{$operations->links()}}
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
    
        $(document).on('click','.delete_operation_btn',function(e){   ///inicio delete 
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
                    url: '/admin/operations/delete-operation/'+id,
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
                            $("#operacao"+id).remove();     
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
        $('#EditOperationModal').on('shown.bs.modal',function(){
            $('#edit_name').focus();
        });
        $(document).on('click','.edit_operation',function(e){  
            e.preventDefault();
            
            var id = $(this).data("id");                                   
            $('#editmyform').trigger('reset');
            $('#EditOperationModal').modal('show');          
            $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/admin/operations/edit-operation/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $('.name').val(response.operation.name);
                        $('#edit_operation_id').val(response.operation.id);
                        $('.edit_icone').replaceWith('<select name="editicone" id="editicone" class="edit_icone custom-select">\
                                    <option value="address-book" '+(response.operation.icone=='address-book' ? 'selected' : '')+'>&#xf2b9; address-book</option>\
                                    <option value="address-card" '+(response.operation.icone=='address-card' ? 'selected' : '')+'>&#xf2bb; address-card</option>\
                                    <option value="angry" '+(response.operation.icone=='angry' ? 'selected' : '')+'>&#xf556; angry</option>\
                                    <option value="arrow-alt-circle-down" '+(response.operation.icone=='arrow-alt-circle-down' ? 'selected' : '')+'>&#xf358; arrow-alt-circle-down</option>\
                                    <option value="arrow-alt-circle-left" '+(response.operation.icone=='arrow-alt-circle-left' ? 'selected' : '')+'>&#xf359; arrow-alt-circle-left</option>\
                                    <option value="arrow-alt-circle-right" '+(response.operation.icone=='arrow-alt-circle-right' ? 'selected' : '')+'>&#xf35a; arrow-alt-circle-right</option>\
                                    <option value="arrow-alt-circle-up" '+(response.operation.icone=='arrow-alt-circle-up' ? 'selected' : '')+'>&#xf35b; arrow-alt-circle-up</option>\
                                    <option value="bell" '+(response.operation.icone=='bell' ? 'selected' : '')+'>&#xf0f3; bell</option>\
                                    <option value="bell-slash" '+(response.operation.icone=='bell-slash' ? 'selected' : '')+'>&#xf1f6; bell-slash</option>\
                                    <option value="bookmark" '+(response.operation.icone=='bookmark' ? 'selected' : '')+'>&#xf02e; bookmark</option>\
                                    <option value="building" '+(response.operation.icone=='building' ? 'selected' : '')+'>&#xf1ad; building</option>\
                                    <option value="calendar" '+(response.operation.icone=='calendar' ? 'selected' : '')+'>&#xf133; calendar</option>\
                                    <option value="calendar-alt" '+(response.operation.icone=='calendar-alt' ? 'selected' : '')+'>&#xf073; calendar-alt</option>\
                                    <option value="calendar-check" '+(response.operation.icone=='calendar-check' ? 'selected' : '')+'>&#xf274; calendar-check</option>\
                                    <option value="calendar-minus" '+(response.operation.icone=='calendar-minus' ? 'selected' : '')+'>&#xf272; calendar-minus</option>\
                                    <option value="calendar-plus" '+(response.operation.icone=='calendar-plus' ? 'selected' : '')+'>&#xf271; calendar-plus</option>\
                                    <option value="calendar-times" '+(response.operation.icone=='calendar-times' ? 'selected' : '')+'>&#xf273; calendar-times</option>\
                                    <option value="caret-square-down" '+(response.operation.icone=='caret-square-down' ? 'selected' : '')+'>&#xf150; caret-square-down</option>\
                                    <option value="caret-square-left" '+(response.operation.icone=='caret-square-left' ? 'selected' : '')+'>&#xf191; caret-square-left</option>\
                                    <option value="caret-square-right" '+(response.operation.icone=='caret-square-right' ? 'selected' : '')+'>&#xf152; caret-square-right</option>\
                                    <option value="caret-square-up" '+(response.operation.icone=='caret-square-up' ? 'selected' : '')+'>&#xf151; caret-square-up</option>\
                                    <option value="chart-bar" '+(response.operation.icone=='chart-bar' ? 'selected' : '')+'>&#xf080; chart-bar</option>\
                                    <option value="check-circle" '+(response.operation.icone=='check-circle' ? 'selected' : '')+'>&#xf058; check-circle</option>\
                                    <option value="check-square" '+(response.operation.icone=='check-square' ? 'selected' : '')+'>&#xf14a; check-square</option>\
                                    <option value="circle" '+(response.operation.icone=='circle' ? 'selected' : '')+'>&#xf111; circle</option>\
                                    <option value="clipboard" '+(response.operation.icone=='clipboard' ? 'selected' : '')+'>&#xf328; clipboard</option>\
                                    <option value="clock" '+(response.operation.icone=='clock' ? 'selected' : '')+'>&#xf017; clock</option>\
                                    <option value="clone" '+(response.operation.icone=='clone' ? 'selected' : '')+'>&#xf24d; clone</option>\
                                    <option value="closed-captioning" '+(response.operation.icone=='closed-captioning' ? 'selected' : '')+'>&#xf20a; closed-captioning</option>\
                                    <option value="comment" '+(response.operation.icone=='comment' ? 'selected' : '')+'>&#xf075; comment</option>\
                                    <option value="comment-alt" '+(response.operation.icone=='comment-alt' ? 'selected' : '')+'>&#xf27a; comment-alt</option>\
                                    <option value="comment-dots" '+(response.operation.icone=='comment-dots' ? 'selected' : '')+'>&#xf4ad; comment-dots</option>\
                                    <option value="comments" '+(response.operation.icone=='comments' ? 'selected' : '')+'>&#xf086; comments</option>\
                                    <option value="compass" '+(response.operation.icone=='compass' ? 'selected' : '')+'>&#xf14e; compass</option>\
                                    <option value="copy" '+(response.operation.icone=='copy' ? 'selected' : '')+'>&#xf0c5; copy</option>\
                                    <option value="copyright" '+(response.operation.icone=='copyright' ? 'selected' : '')+'>&#xf1f9; copyright</option>\
                                    <option value="credit-card" '+(response.operation.icone=='credit-card' ? 'selected' : '')+'>&#xf09d; credit-card</option>\
                                    <option value="dizzy" '+(response.operation.icone=='dizzy' ? 'selected' : '')+'>&#xf567; dizzy</option>\
                                    <option value="dot-circle" '+(response.operation.icone=='dot-circle' ? 'selected' : '')+'>&#xf192; dot-circle</option>\
                                    <option value="edit" '+(response.operation.icone=='edit' ? 'selected' : '')+'>&#xf044; edit</option>\
                                    <option value="envelope" '+(response.operation.icone=='envelope' ? 'selected' : '')+'>&#xf40e0; envelope </option>\
                                    <option value="envelope-open" '+(response.operation.icone=='envelope-open' ? 'selected' : '')+'>&#xf2b6; envelope-open</option>\
                                    <option value="eye" '+(response.operation.icone=='eye' ? 'selected' : '')+'>&#xf06e; eye</option>\
                                    <option value="eye-slash" '+(response.operation.icone=='eye-slash' ? 'selected' : '')+'>&#xf070; eye-slash</option>\
                                    <option value="file" '+(response.operation.icone=='file' ? 'selected' : '')+'>&#xf15b; file</option>\
                                    <option value="file-alt" '+(response.operation.icone=='file-alt' ? 'selected' : '')+'>&#xf15c; file-alt</option>\
                                    <option value="file-archive" '+(response.operation.icone=='file-archive' ? 'selected' : '')+'>&#xf1c6; file-archive</option>\
                                    <option value="file-audio" '+(response.operation.icone=='file-audio' ? 'selected' : '')+'>&#xf1c7; file-audio</option>\
                                    <option value="file-code" '+(response.operation.icone=='file-code' ? 'selected' : '')+'>&#xf1c9; file-code</option>\
                                    <option value="file-excel" '+(response.operation.icone=='file-excel' ? 'selected' : '')+'>&#xf1c3; file-excel </option>\
                                    <option value="file-image" '+(response.operation.icone=='file-image' ? 'selected' : '')+'>&#xf1c5; file-image</option>\
                                    <option value="file-pdf" '+(response.operation.icone=='file-pdf' ? 'selected' : '')+'>&#xf1c1; file-pdf</option>\
                                    <option value="file-powerpoint" '+(response.operation.icone=='file-powerpoint' ? 'selected' : '')+'>&#xf1c4; file-powerpoint</option>\
                                    <option value="file-video" '+(response.operation.icone=='file-video' ? 'selected' : '')+'>&#xf1c8; file-video</option>\
                                    <option value="file-word" '+(response.operation.icone=='file-word' ? 'selected' : '')+'>&#xf1c2; file-word</option>\
                                    <option value="flag" '+(response.operation.icone=='flag' ? 'selected' : '')+'>&#xf024; flag</option>\
                                    <option value="flushed" '+(response.operation.icone=='flushed' ? 'selected' : '')+'>&#xf579; flushed</option>\
                                    <option value="folder" '+(response.operation.icone=='folder' ? 'selected' : '')+'>&#xf07b; folder</option>\
                                    <option value="folder-open" '+(response.operation.icone=='folder-open' ? 'selected' : '')+'>&#xf07c; folder-open </option>\
                                    <option value="frown" '+(response.operation.icone=='frown' ? 'selected' : '')+'>&#xf119; frown</option>\
                                    <option value="frown-open" '+(response.operation.icone=='frown-open' ? 'selected' : '')+'>&#xf57a; frown-open</option>\
                                    <option value="futbol" '+(response.operation.icone=='futbol' ? 'selected' : '')+'>&#xf1e3; futbol</option>\
                                    <option value="gem" '+(response.operation.icone=='gem' ? 'selected' : '')+'>&#xf3a5; gem</option>\
                                    <option value="grimace" '+(response.operation.icone=='grimace' ? 'selected' : '')+'>&#xf57f; grimace</option>\
                                    <option value="grin" '+(response.operation.icone=='grin' ? 'selected' : '')+'>&#xf580; grin</option>\
                                    <option value="grin-alt" '+(response.operation.icone=='grin-alt' ? 'selected' : '')+'>&#xf581; grin-alt</option>\
                                    <option value="grin-beam" '+(response.operation.icone=='grin-beam' ? 'selected' : '')+'>&#xf582; grin-beam</option>\
                                    <option value="grin-beam-sweet" '+(response.operation.icone=='grin-beam-sweet' ? 'selected' : '')+'>&#xf583; grin-beam-sweet </option>\
                                    <option value="grin-hearts" '+(response.operation.icone=='grin-hearts' ? 'selected' : '')+'>&#xf584; grin-hearts</option>\
                                    <option value="grin-squint" '+(response.operation.icone=='grin-squint' ? 'selected' : '')+'>&#xf585; grin-squint</option>\
                                    <option value="grin-squint-tears" '+(response.operation.icone=='grin-squint-tears' ? 'selected' : '')+'>&#xf586; grin-squint-tears</option>\
                                    <option value="grin-stars" '+(response.operation.icone=='grin-stars' ? 'selected' : '')+'>&#xf587; grin-stars</option>\
                                    <option value="grin-tears" '+(response.operation.icone=='grin-tears' ? 'selected' : '')+'>&#xf588; grin-tears</option>\
                                    <option value="grin-tongue" '+(response.operation.icone=='grin-tongue' ? 'selected' : '')+'>&#xf589; grin-tongue</option>\
                                    <option value="grin-tongue-squint" '+(response.operation.icone=='grin-tongue-squint' ? 'selected' : '')+'>&#xf58a; grin-tongue-squint</option>\
                                    <option value="grin-tongue-wink" '+(response.operation.icone=='grin-tonque-wink' ? 'selected' : '')+'>&#xf58b; grin-tongue-wink</option>\
                                    <option value="grin-wink" '+(response.operation.icone=='grin-wink' ? 'selected' : '')+'>&#xf58c; grin-wink </option>\
                                    <option value="hand-lizard" '+(response.operation.icone=='hand-lizard' ? 'selected' : '')+'>&#xf258; hand-lizard</option>\
                                    <option value="hand-paper" '+(response.operation.icone=='hand-paper' ? 'selected' : '')+'>&#xf256; hand-paper</option>\
                                    <option value="hand-peace" '+(response.operation.icone=='hand-peace' ? 'selected' : '')+'>&#xf25b; hand-peace</option>\
                                    <option value="hand-point-down" '+(response.operation.icone=='hand-point-down' ? 'selected' : '')+'>&#xf0a7; hand-point-down</option>\
                                    <option value="hand-point-left" '+(response.operation.icone=='hand-point-left' ? 'selected' : '')+'>&#xf0a5; hand-point-left</option>\
                                    <option value="hand-point-right" '+(response.operation.icone=='hand-point-right' ? 'selected' : '')+'>&#xf0a4; hand-point-right</option>\
                                    <option value="hand-point-up" '+(response.operation.icone=='hand-point-up' ? 'selected' : '')+'>&#xf0a6; hand-point-up</option>\
                                    <option value="hand-pointer" '+(response.operation.icone=='hand-pointer' ? 'selected' : '')+'>&#xf25a; hand-pointer</option>\
                                    <option value="hand-rock" '+(response.operation.icone=='hand-rock' ? 'selected' : '')+'>&#xf255; hand-rock </option>\
                                    <option value="hand-scissors" '+(response.operation.icone=='hand-scissors' ? 'selected' : '')+'>&#xf257; hand-scissors</option>\
                                    <option value="hand-spock" '+(response.operation.icone=='hand-spock' ? 'selected' : '')+'>&#xf259; hand-spock</option>\
                                    <option value="handshake" '+(response.operation.icone=='handshake' ? 'selected' : '')+'>&#xf2b5; handshake</option>\
                                    <option value="hdd" '+(response.operation.icone=='hdd' ? 'selected' : '')+'>&#xf0a0; hdd</option>\
                                    <option value="heart" '+(response.operation.icone=='heart' ? 'selected' : '')+'>&#xf004; heart</option>\
                                    <option value="home" '+(response.operation.icone=='home' ? 'selected' : '')+'>&#xf015; home</option>\
                                    <option value="hospital" '+(response.operation.icone=='hospital' ? 'selected' : '')+'>&#xf0f8; hospital</option>\
                                    <option value="hourglass" '+(response.operation.icone=='hourglass' ? 'selected' : '')+'>&#xf254; hourglass</option>\
                                    <option value="id-badge" '+(response.operation.icone=='id-badge' ? 'selected' : '')+'>&#xf2c1; id-badge</option>\
                                    <option value="id-card" '+(response.operation.icone=='id-card' ? 'selected' : '')+'>&#xf2c2; id-card </option>\
                                    <option value="image" '+(response.operation.icone=='image' ? 'selected' : '')+'>&#xf03e; image</option>\
                                    <option value="images" '+(response.operation.icone=='images' ? 'selected' : '')+'>&#xf302; images</option>\
                                    <option value="keyboard" '+(response.operation.icone=='keyboard' ? 'selected' : '')+'>&#xf11c; keyboard</option>\
                                    <option value="kiss" '+(response.operation.icone=='kiss' ? 'selected' : '')+'>&#xf596; kiss</option>\
                                    <option value="kiss-beam" '+(response.operation.icone=='kiss-beam' ? 'selected' : '')+'>&#xf597; kiss-beam</option>\
                                    <option value="kiss-wink-heart" '+(response.operation.icone=='kiss-wink-heart' ? 'selected' : '')+'>&#xf598; kiss-wink-heart</option>\
                                    <option value="laugh" '+(response.operation.icone=='laugh' ? 'selected' : '')+'>&#xf599; laugh</option>\
                                    <option value="laugh-beam" '+(response.operation.icone=='laugh-beam' ? 'selected' : '')+'>&#xf59a; laugh-beam</option>\
                                    <option value="laugh-squint" '+(response.operation.icone=='laugh-squint' ? 'selected' : '')+'>&#xf59b; laugh-squint </option>\
                                    <option value="laugh-wink" '+(response.operation.icone=='laugh-wink' ? 'selected' : '')+'>&#xf59c; laugh-wink</option>\
                                    <option value="lemon" '+(response.operation.icone=='lemon' ? 'selected' : '')+'>&#xf094; lemon</option>\
                                    <option value="life-ring" '+(response.operation.icone=='life-ring' ? 'selected' : '')+'>&#xf1cd; life-ring</option>\
                                    <option value="lightbulb" '+(response.operation.icone=='lightbulb' ? 'selected' : '')+'>&#xf0eb; lightbulb</option>\
                                    <option value="list-alt" '+(response.operation.icone=='list-alt' ? 'selected' : '')+'>&#xf022; list-alt</option>\
                                    <option value="map" '+(response.operation.icone=='map' ? 'selected' : '')+'>&#xf279; map</option>\
                                    <option value="meh" '+(response.operation.icone=='meh' ? 'selected' : '')+'>&#xf11a; meh</option>\
                                    <option value="meh-blank" '+(response.operation.icone=='meh-blank' ? 'selected' : '')+'>&#xf5a4; meh-blank</option>\
                                    <option value="meh-rolling-eyes" '+(response.operation.icone=='meh-rolling-eyes' ? 'selected' : '')+'>&#xf5a5; meh-rolling-eyes </option>\
                                    <option value="minus-square" '+(response.operation.icone=='minus-square' ? 'selected' : '')+'>&#xf146; minus-square</option>\
                                    <option value="money-bill-alt" '+(response.operation.icone=='money-bill-alt' ? 'selected' : '')+'>&#xf3d1; money-bill-alt</option>\
                                    <option value="moon" '+(response.operation.icone=='moon' ? 'selected' : '')+'>&#xf186; moon</option>\
                                    <option value="newspaper" '+(response.operation.icone=='newspaper' ? 'selected' : '')+'>&#xf1ea; newspaper</option>\
                                    <option value="object-group" '+(response.operation.icone=='object-group' ? 'selected' : '')+'>&#xf247; object-group</option>\
                                    <option value="object-upgroup" '+(response.operation.icone=='object-upgroup' ? 'selected' : '')+'>&#xf248; object-upgroup</option>\
                                    <option value="paper-plane" '+(response.operation.icone=='paper-plane' ? 'selected' : '')+'>&#xf1d8; paper-plane</option>\
                                    <option value="pause-circle" '+(response.operation.icone=='pause-circle' ? 'selected' : '')+'>&#xf28b; pause-circle</option>\
                                    <option value="play-circle" '+(response.operation.icone=='play-circle' ? 'selected' : '')+'>&#xf144; play-circle </option>\
                                    <option value="plus-square" '+(response.operation.icone=='plus-square' ? 'selected' : '')+'>&#xf0fe; plus-square</option>\
                                    <option value="question-circle" '+(response.operation.icone=='question-circle' ? 'selected' : '')+'>&#xf059; question-circle</option>\
                                    <option value="registered" '+(response.operation.icone=='registered' ? 'selected' : '')+'>&#xf25d; registered</option>\
                                    <option value="sad-cry" '+(response.operation.icone=='sad-cry' ? 'selected' : '')+'>&#xf5b3; sad-cry</option>\
                                    <option value="sad-tear" '+(response.operation.icone=='sad-tear' ? 'selected' : '')+'>&#xf5b4; sad-tear</option>\
                                    <option value="save" '+(response.operation.icone=='save' ? 'selected' : '')+'>&#xf0c7; save</option>\
                                    <option value="share-square" '+(response.operation.icone=='share-square' ? 'selected' : '')+'>&#xf14d; share-square</option>\
                                    <option value="smile" '+(response.operation.icone=='smile' ? 'selected' : '')+'>&#xf118; smile</option>\
                                    <option value="smile-beam" '+(response.operation.icone=='smile-beam' ? 'selected' : '')+'>&#xf5b8; smile-beam </option>\
                                    <option value="smile-wink" '+(response.operation.icone=='smile-wink' ? 'selected' : '')+'>&#xf4da; smile-wink</option>\
                                    <option value="snowflake" '+(response.operation.icone=='snowflake' ? 'selected' : '')+'>&#xf2dc; snowflake</option>\
                                    <option value="square" '+(response.operation.icone=='square' ? 'selected' : '')+'>&#xf0c8; square</option>\
                                    <option value="star" '+(response.operation.icone=='star' ? 'selected' : '')+'>&#xf005; star</option>\
                                    <option value="star-half" '+(response.operation.icone=='star-half' ? 'selected' : '')+'>&#xf089; star-half</option>\
                                    <option value="sticky-note" '+(response.operation.icone=='sticky-note' ? 'selected' : '')+'>&#xf249; sticky-note</option>\
                                    <option value="stop-circle" '+(response.operation.icone=='stop-circle' ? 'selected' : '')+'>&#xf28d; stop-circle</option>\
                                    <option value="sun" '+(response.operation.icone=='sun' ? 'selected' : '')+'>&#xf185; sun</option>\
                                    <option value="surprise" '+(response.operation.icone=='surprise' ? 'selected' : '')+'>&#xf5c2; surprise </option>\
                                    <option value="thumbs-down" '+(response.operation.icone=='thumbs-down' ? 'selected' : '')+'>&#xf165; thumbs-down</option>\
                                    <option value="thumbs-up" '+(response.operation.icone=='thumbs-up' ? 'selected' : '')+'>&#xf1164; thumbs-up</option>\
                                    <option value="times-circle" '+(response.operation.icone=='times-circle' ? 'selected' : '')+'>&#xf057; times-circle</option>\
                                    <option value="tired" '+(response.operation.icone=='tired' ? 'selected' : '')+'>&#xf5c8; tired</option>\
                                    <option value="trash-alt" '+(response.operation.icone=='trash-alt' ? 'selected' : '')+'>&#xf2ed; trash-alt</option>\
                                    <option value="user" '+(response.operation.icone=='user' ? 'selected' : '')+'>&#xf007; user</option>\
                                    <option value="user-circle" '+(response.operation.icone=='user-circle' ? 'selected' : '')+'>&#xf2bd; user-circle</option>\
                                    <option value="window-close" '+(response.operation.icone=='window-close' ? 'selected' : '')+'>&#xf410; window-close</option>\
                                    <option value="window-maximize" '+(response.operation.icone=='window-maximize' ? 'selected' : '')+'>&#xf2d0; window-maximize </option>\
                                    <option value="window-minimize" '+(response.operation.icone=='window-minimize' ? 'selected' : '')+'>&#xf2d1; window-minimize</option>\
                                    <option value="window-restore" '+(response.operation.icone=='window-restore' ? 'selected' : '')+'>&#xf2d2; window-restore</option>\
                            </select>');
                    }      
                }
            });
    
        }); //fim da da exibição do form de edição
    
        $(document).on('click','.update_operation',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            var loading = $('#imgedit');
                loading.show();
    
            var id = $('#edit_operation_id').val();        
    
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
                url: '/admin/operations/update-operation/'+id,         
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
                        $('#EditOperationModal').modal('hide');                  
                        
                        //atualizando a linha na tabela html                      
    
                            var linha = '<tr id="operacao'+response.operation.id+'">\
                                    <th scope="row"><i class="fas fa-'+response.operation.icone+'"></i> '+response.operation.name+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.operation.id+'" class="edit_operation fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.operation.id+'" data-name="'+response.operation.name+'" class="delete_operation_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';                             
                        $("#operacao"+id).replaceWith(linha);                                                                                
    
                    }
                }
            });    
    
        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $('#AddOperationModal').on('shown.bs.modal',function(){
            $('.name').focus();
        });
        $(document).on('click','.AddOperationModal_btn',function(e){  //início da exibição do form
            e.preventDefault();       
            
            $('#addmyform').trigger('reset');
            $('#AddOperationModal').modal('show'); 
            $('#saveform_errList').html('<ul id="saveform_errList"></ul>');                       
    
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_operation',function(e){ //início da adição de Registro
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
                url: '/admin/operations/add-operation',
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
                        $('#AddOperationModal').modal('hide');
    
                        //adiciona a linha na tabela html                      
                            
                        var tupla = "";
                        var linha0 = "";
                        var linha1 = "";
                            linha0 = '<tr id="novo" style="display:none;"></tr>';
                            linha1 = '<tr id="operacao'+response.operation.id+'">\
                                    <th scope="row"><i class="fas fa-'+response.operation.icone+'"></i> '+response.operation.name+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.operation.id+'" class="edit_operation fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.operation.id+'" data-name="'+response.operation.name+'" class="delete_operation_btn fas fa-trash" style="background:transparent;border:none"></button>\
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
    
    }); ///Fim do escopo do script
    
    </script>
@stop