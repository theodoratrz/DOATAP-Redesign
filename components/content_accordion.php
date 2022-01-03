<link rel="stylesheet" href="css/content_accordion.css">

<?php

    const sampleContent = array(
        array(
            "<b>header1</b>",
            "<p3>content1</p3>"
        ),
        array(
            "<i>header2</i>",
            "<b>content2</b>"
        ),
        array(
            "<span>header3</span>",
            "<code>content3</code>"
        )
    );

    function echoAccordion(array $contents) {
        echo "<div class='accordion accordion-flush' id='contentAccordionFlush'>";

        foreach ($contents as $index => $pair) {
            echo "<div class='accordion-item'>";
            
            echoAccordionHeader($pair[0], $index);
            
            echoAccordionContent($pair[1], $index);

            echo "</div>";
        }

        echo "</div>";
    }

    function echoAccordionHeader(string $headerInnerHTML, int $index)
    {
        echo "<h2 class='accordion-header' id='flush-heading$index'>";
        echo "
        <button class='accordion-button collapsed shadow-none' type='button' data-bs-toggle='collapse'
            data-bs-target='#flush-collapse$index' aria-expanded='false' aria-controls='flush-collapse$index'>
        ";
        echo $headerInnerHTML;
        echo "</button>";
        echo "</h2>";
    }

    function echoAccordionContent(string $contentInnerHTML, int $index)
    {
        echo "<div id='flush-collapse$index' class='accordion-collapse collapse' 
        aria-labelledby='flush-heading$index' data-bs-parent='#contentAccordionFlush'>
            <div class='accordion-body'>$contentInnerHTML</div>
        </div>
        ";
    }

    echoAccordion(sampleContent);
?>

<!-- <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
</div> -->
