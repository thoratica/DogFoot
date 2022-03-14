<?php

function getTextBetweenTags($string, $tagname)
{
  $pattern = "/<$tagname ?(.*)>(.*)<\/$tagname>/";
  preg_match($pattern, $string, $matches);
  return $matches;
}

class DogFootTemplate extends BaseTemplate
{
  public function execute()
  {
    $this->data['content_actions']['nstab-main']['text'] = wfMessage('view')->parse();
    $this->html('headelement');
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="min-h-screen w-full">
      <nav class="sticky flex items-center h-16">
        <div class="mx-auto px-3 xs:px-6 flex max-w-7xl w-max xs:w-full">
          <a href="<?php
                    echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']);
                    ?>" class="outline-none focus:filter focus:brightness-95 transition-all">
            <img src="<?php $this->text('logopath'); ?>" class="h-6" />
          </a>
        </div>
      </nav>

      <div class="flex">
        <section class="mx-auto px-3 xs:px-6 flex max-w-7xl w-full">
          <article class="py-6 w-full">
            <div class="flex">
              <h1 class="text-gray-900 outline-none focus:filter focus:brightness-95 transition-all font-semibold text-3xl xs:text-4xl m-0 p-0 border-0">
                <?php $this->html('title'); ?>
              </h1>
            </div>
            <?php $this->html('catlinks'); ?>
            <section class="prose max-w-none prose-a:text-blue-500 hover:prose-a:text-blue-500/80 focus:prose-a:text-blue-500/80 prose-a:decoration-transparent hover:prose-a:decoration-blue-400 prose-a:decoration-dotted py-4 prose-headings:border-b prose-headings:pb-1.5 prose-headings:border-gray-200">
              <?php $this->html('bodytext'); ?>
            </section>
          </article>
        </section>
      </div>
    </div>

    </html>
<?php
  }
}
