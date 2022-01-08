<link rel="stylesheet" href="/public/css/content_accordion.css">

<?php

    const sampleContent = array(
        array(
            "<b>header1</b>",
            "<div style='display: flex; flex-direction: row; column-gap:0.5em;'>
                <span style='font-size: 0.75em'>Hi</span>
                <i>Hi</i>
                <b>Hi</b>
            </div>"
        ),
        array(
            "<i>header2</i>",
            "<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow."
        )
    );

    function echoAccordion(array $contents, bool $stayOpen) {
        echo "<div class='accordion accordion-flush' id='contentAccordionFlush'>";

        foreach ($contents as $index => $pair) {
            echo "<div class='accordion-item'>";
            
            echoAccordionHeader($pair[0], $index);
            
            echoAccordionContent($pair[1], $index, $stayOpen);

            echo "</div>";
        }

        echo "</div>";
    }

    function echoAccordionHeader(string $headerInnerHTML, int $index)
    {
        echo "<h2 class='accordion-header' id='flush-heading$index'>";
        echo "
        <button class='accordion-button collapsed shadow-none' type='button' data-bs-toggle='collapse'
            data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index' style='align-items:center;'>
        ";
        echo $headerInnerHTML;
        echo "</button>";
        echo "</h2>";
    }

    function echoAccordionContent(string $contentInnerHTML, int $index, bool $stayOpen)
    {
        echo "<div id='flush-collapse$index' class='accordion-collapse collapse' 
        aria-labelledby='flush-heading$index'";

        if (!$stayOpen) {
            echo "data-bs-parent='#contentAccordionFlush'";
        }

        echo "
        >
            <div class='accordion-body'>$contentInnerHTML</div>
        </div>
        ";
    }

    # echoAccordion(sampleContent, true);
?>
