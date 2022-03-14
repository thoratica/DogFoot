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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="min-h-screen w-full">
      <nav class="sticky flex items-center h-16">
        <div class="mx-auto px-3 xs:px-6 flex items-center max-w-7xl w-max xs:w-full">
          <a href="<?php
                    echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']);
                    ?>" class="outline-none focus:filter focus:brightness-95 transition-all">
            <img src="<?php $this->text('logopath'); ?>" class="h-6" />
          </a>
          <div class="ml-auto">
            <?php
            if ($this->getSkin()->getUser()->isRegistered()) {
            ?>
              <div class="profile group">
                <button class="px-3.5 py-2 transition-colors duration-300 rounded-lg outline-none focus:bg-gray-100 hover:bg-gray-100">
                  <i class="fa-solid fa-user text-gray-900"></i>
                </button>
                <div class="fixed h-0">
                  <ul class="relative bg-gray-50 p-1.5 border border-gray-50 shadow-lg rounded-lg right-[calc(100%_-_42px)] opacity-0 invisible transform -translate-y-4 transition-all duration-300 ease-in-out group-hover:opacity-100 group-hover:visible group-hover:translate-x-1 group-hover:translate-y-0 group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-x-1 group-focus-within:translate-y-0">
                    <?php foreach ($this->getPersonalTools() as $key => $item) {
                      echo $this->makeListItem($key, $item);
                    } ?>
                  </ul>
                </div>
              </div>

            <?php
            } else { ?>
              <ul class="flex gap-x-4">
                <?php
                foreach ($this->getPersonalTools() as $key => $item) { ?>
                  <?php echo $this->makeListItem($key, $item) ?>
                <?php
                } ?>
              </ul>
            <?php
            }
            ?>
            <!-- <?php
                  if ($this->getSkin()->getUser()->isRegistered()) { ?>
              <a title="파일 업로드" class="border-b " href="https://wiki.pmh.codes/wiki/특수:업로드">
                <i class="fas fa-cloud-upload-alt text-neutral-600"></i>
              </a>
              <a title="환경설정" class="border-b " href="https://wiki.pmh.codes/wiki/특수:환경설정">
                <i class="fas fa-cogs text-neutral-600"></i>
              </a>
              <a title="로그아웃" class="" href="https://wiki.pmh.codes/wiki/특수:로그아웃">
                <i class="fas fa-sign-out-alt text-neutral-600"></i>
                로그아웃
              </a>
            <?php } else { ?>
              <a title="로그인" class="" href="https://wiki.pmh.codes/wiki/특수:로그인">
                <i class="fas fa-sign-in-alt text-neutral-600"></i>
                로그인
              </a>
            <?php } ?> -->
          </div>
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
            <section class="prose max-w-none prose-a:text-blue-500 hover:prose-a:text-blue-500/80 focus:prose-a:text-blue-500/80 prose-a:decoration-transparent hover:prose-a:decoration-blue-400 prose-a:decoration-dotted py-4 prose-headings:border-gray-200">
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
