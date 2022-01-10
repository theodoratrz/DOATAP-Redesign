<?php

const tab_content = array(
    "Βασικές Πληροφορίες" => array(
        "basic_info",
        '<p><strong>This is some placeholder content the Βασικές Πληροφορίες tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
    "Επιλεγμένα Τμήματα" => array(
        "selected_deps",
        '<p><strong>This is some placeholder content the Επιλεγμένα Τμήματα tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
    "Επιλογές Αντιστοίχησης" => array(
        "course_choices",
        '<p><strong>This is some placeholder content the Επιλογές Αντιστοίχησης tab\'s associated content.</strong>
        Clicking another tab will toggle the visibility of this one for the next.
        The tab JavaScript swaps classes to control the content visibility and styling.
        You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>'
    ),
);

function echoTabHeader(string $title, string $tabID, bool $active)
{
    echo '
    <li class="nav-item" role="presentation">
        <button class="tab-title nav-link ' . ($active ? 'active' : '') . '" id="' . $tabID . '-tab"
            data-bs-toggle="tab" data-bs-target="#' . $tabID . '"
            type="button" role="tab" aria-controls="' . $title .'" aria-selected="' . ($active ? 'true' : 'false') . '">
            ' . $title . '
        </button>
    </li>
    ';
}

function echoTabSubcontent(string $tabID, string $contentInnerHTML, bool $active)
{
    echo '
    <div class="tab-pane fade show ' . ($active ? 'active' : '') . '" id="' . $tabID . '"
        role="tabpanel" aria-labelledby="' . $tabID . '-tab">
    ' . $contentInnerHTML .'
    </div>
    ';
}

function echoContentTabs(array $content) {
    echo '
    <ul class="nav nav-tabs" id="tabHeaders" role="tablist">
    ';
    $cur = 0;
    foreach ($content as $title => $value) {
        $tabID = $value[0];
        echoTabHeader($title, $tabID, $cur === 0);
        $cur++;
    }
    echo '
    </ul>';

    echo '
    <div class="tab-content" id="tabContents">
    ';
    $cur = 0;
    foreach ($content as $title => $value) {
        $tabID = $value[0];
        $subcontent = $value[1];
        echoTabSubcontent($tabID, $subcontent, $cur === 0);
        $cur++;
    }
    echo '
    </div>';
}

?>

<link rel="stylesheet" href="/public/css/content_tabs.css">
<div class="tab-wrapper">
    <?php
    echoContentTabs(tab_content);
    ?>
    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="tab-title nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                Βασικές Πληροφορίες
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="tab-title nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                Επιλεγμένα Τμήματα
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="tab-title nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                Επιλογές Αντιστοίχησης
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div> -->
</div>
