<?php

    $empty = false;

    $submitted_nouns = trim(filter_input(INPUT_POST, 'nouns', FILTER_SANITIZE_STRING));
    $submitted_verbs = trim(filter_input(INPUT_POST, 'verbs', FILTER_SANITIZE_STRING));
    $submitted_adjectives = trim(filter_input(INPUT_POST, 'adjectives', FILTER_SANITIZE_STRING));
    $submitted_adverbs = trim(filter_input(INPUT_POST, 'adverbs', FILTER_SANITIZE_STRING));
    $submitted_verb_ing = trim(filter_input(INPUT_POST, 'verb-ing', FILTER_SANITIZE_STRING));
    $story = trim(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_STRING));


    $verb_list = array();
    $noun_list = array();
    $adjectives = array();
    $adverbs = array();

    function random_word($array, &$num_array) {
        $num = rand(0, 9);
        if (empty($num_array)) {
            $num_array[] = $num;
            return $array[$num];
        } else {
                if (in_array($num, $num_array)) {
                    return false;
                } else {
                    $num_array[] = $num;
                    return $array[$num];
                }
            }
        }


    function get_words($array) {
        $num_array = array();
        $words_list = array();
        for ($i=0; $i < 5; $i++) {
            $word = random_word($array, $num_array);
            if (!$word) {
                $i--;
            } else {
                $words_list[] = $word;
            }
        }
        return $words_list;
    }

    function fill_array($count, $array, $filler) {
        $num_array = array();
        if ($count < 5) {
            $diff = 5 - $count;
            while ($diff > 0) {
                $array[] = random_word($filler, $num_array);
                $diff--;
            }
        }
        return $array;
    }

    include 'words.php';

    if (empty($submitted_nouns)) {
        $noun_list = get_words($nouns);
    } else {
        $user_nouns = explode(',', $submitted_nouns);
        $user_nouns = fill_array(count($user_nouns), $user_nouns, $nouns);
        $noun_list = get_words($user_nouns);
    }

    if (empty($submitted_verbs)) {
        $verb_list = get_words($verbs);
    } else {
        $user_verbs = explode(',', $submitted_verbs);
        $user_verbs = fill_array(count($user_verbs), $user_verbs, $verbs);
        $verb_list = get_words($user_verbs);
    }

    if (empty($submitted_adjectives)) {
        $adjective_list = get_words($adjectives);
    } else {
        $user_adjectives = explode(',', $submitted_adjectives);
        $user_adjectives = fill_array(count($user_adjectives), $user_adjectives, $adjectives);
        $adjective_list = get_words($user_adjectives);
    }

    if (empty($submitted_adverbs)) {
        $adverb_list = get_words($adverbs);
    } else {
        $user_adverbs = explode(',', $submitted_adverbs);
        $user_adverbs = fill_array(count($user_adverbs), $user_adverbs, $adverbs);
        $adverb_list = get_words($user_adverbs);
    }

    if (empty($submitted_verb_ing)) {
        $verb_ing = random_word($verb_ings);
    } else {
        $user_nouns = explode(',', $submitted_verb_ing);
        $verb_ing = $user_nouns[0];
    }


 ?>
<html>
    <head>
        <link href='stylesheet.css' type='text/css', rel='stylesheet'>
    </head>
    <body>
        <center>
            <div id='input'>
                <h2>Mad Libs</h2>
                <p><strong>Instructions: </strong>Enter 5 words, separated by a comma, for each of the fields below. If you enter no words or not enough words, words will be chosen at random. Thanks for playing!</p>
                <form id='word-form' name='word-form' method='post'>
                    <input type='text' name='nouns' placeholder="noun, noun, noun, etc."></input>
                    <input type='text' name='verbs' placeholder="verb, verb, verb, etc."></input>
                    <input type='text' name='adjectives' placeholder="adjective, adjective, adjective, etc."></input>
                    <input type='text' name='adverbs' placeholder="adverb, adverb, adverb, etc."></input>
                    <input type='text' name='verb-ing' placeholder="verb ending in -ing"></input>
                    <p>Which story would you like to create?</p>
                    <div class='radio'><label for='walk'>Taking a walk: </label> <input type='radio' name='story' value='walk' id='walk' checked></div><br>
                    <div class='radio'><label for='promotion'>Getting a promotion: </label><input type='radio' name='story' id='promotion' value='promotion'><br></div>
                    <input type='submit' class='btn'></input>
                </form>
            </div>
            <div id='story'>
                <?php
                if ($story == 'walk') {
                    echo "As you <b>{$verb_list[0]}</b> down the street on the way home from <b>{$verb_ing}</b> <b>{$adjective_list[0]} {$noun_list[0]}s</b>, you suddenly heard a <b>{$noun_list[1]}</b> behind you. You <b>{$verb_list[1]} {$adverb_list[0]}</b>. A <b>{$adjective_list[1]} {$noun_list[2]} {$adverb_list[1]} {$verb_list[2]}s</b> behind you. What to do? The road is too <b>{$adjective_list[2]}</b> to <b>{$verb_list[3]}</b>, and you only have your <b>{$adjective_list[3]} {$noun_list[3]}</b>. As you prepare to <b>{$verb_list[4]}</b>, the <b>{$noun_list[2]} {$adverb_list[2]}</b> jumps over the <b>{$noun_list[4]}</b> and away from you. You sigh <b>{$adverb_list[3]}</b> and continue walking to your <b>{$adjective_list[4]}</b> house.";
                } elseif ($story == 'promotion'){
                    echo "You just got a <b>{$adjective_list[0]}</b> promotion! You are now the <b>{$adjective_list[1]} {$noun_list[0]}</b> of the  <b>".ucfirst($adjective_list[2])." ".ucfirst($noun_list[1])."</b>! You are in charge of 20 <b>{$noun_list[2]}s</b> who <b>{$verb_list[0]} {$adverb_list[0]}</b> every day, and you need to make sure there aren't any <b>{$adjective_list[3]}</b> problems. If you do end up having any problems with the <b>{$noun_list[3]}</b>, make sure to <b>{$adverb_list[1]} {$verb_list[1]}</b> in the <b>{$adjective_list[4]} {$verb_ing} {$noun_list[4]}s</b>, as they are the only ones who can <b>{$adverb_list[2]} {$verb_list[2]}</b> it. Questions? Comments? Please <b>{$adverb_list[3]} {$verb_list[3]}</b> them to Human Resources Department, and they will <b>{$adverb_list[4]} {$verb_list[4]}</b> it on to your superior.";
                } else {
                    echo "";
                }
                ?>
            </div>
        </center>
    </body>

</html>
