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
    $useDefaultURL = false;

    $this->data["content_actions"]["nstab-main"]["text"] = wfMessage("view")->parse();
    $this->html("headelement");
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="df-screen">
      <nav class="df-nav">
        <div class="df-nav-inner">
          <a href="<?php
                    echo htmlspecialchars($this->data["nav_urls"]["mainpage"]["href"]);
                    ?>" class="df-logo-anchor">
            <img src="<?php $this->text("logopath"); ?>" />
          </a>
          <div class="df-nav-menu">
            <?php
            if ($this->getSkin()->getUser()->isRegistered()) {
            ?>
              <div class="df-button-wrapper">
                <a href="/w/특수:올리기" title="파일 업로드" class="df-upload-button">
                  <i class="fas fa-cloud-upload-alt text-neutral-600"></i>
                </a>
                <div class="df-logon-menu">
                  <button class="df-logon-menu-button">
                    <i class="fa-solid fa-user"></i>
                  </button>
                  <div class="df-logon-menu-popup">
                    <div class="df-logon-menu-popup-inner">
                      <?php foreach ($this->getPersonalTools() as $key => $item) {
                      ?>
                        <a id="<?php echo $item["id"] ?>" href="<?php echo $item["links"][0]["href"] ?>" title="<?php echo $item["links"][0]["text"] ?>" class="df-logon-menu-popup-item"><?php echo $item["links"][0]["text"] ?></a>
                      <?php
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } else { ?>
              <a id="<?php echo $this->getPersonalTools()["login"]["id"] ?>" href="<?php echo $this->getPersonalTools()["login"]["links"][0]["href"] ?>" title="<?php echo $this->getPersonalTools()["login"]["links"][0]["text"] ?>" class="df-login-button">
                <i class="fa-solid fa-right-from-bracket"></i>
              </a>
            <?php
            }
            ?>
          </div>
        </div>
      </nav>

      <section class="df-main">
        <article class="df-article">
          <div class="df-header">
            <div class="df-header-info">
              <h1 class="df-header-info-title">
                <?php $this->html("title"); ?>
              </h1>
              <div class="df-header-buttons">
                <?php
                if ($this->getSkin()->getUser()->isRegistered()) {
                ?>
                  <a id="ca-edit" href="<?php echo ($useDefaultURL && $this->data["content_actions"]["ve-edit"]["href"]) ? $this->data["content_actions"]["ve-edit"]["href"] : "/w/" . $this->getSkin()->getTitle() . "?veaction=edit" ?>" class="df-header-button df-header-button-veditor" title="시각 편집 모드">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["edit"]["href"] ?? "#") ? $this->data["content_actions"]["edit"]["href"] ?? "#" : "/w/" . $this->getSkin()->getTitle() . "?action=edit" ?>" class="df-header-button df-header-button-editor" title="원본 편집 모드">
                    <i class="fa-solid fa-pen"></i>
                  </a>

                  <div class="df-header-more-menu">
                    <button class="df-header-button df-header-button-more" title="더보기">
                      <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <div class="df-header-buttons-more-wrapper">
                      <div class="df-header-buttons-more">
                        <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["history"]["href"] ?? "#") ? $this->data["content_actions"]["history"]["href"] ?? "#" : "/w/" . $this->getSkin()->getTitle() . "?action=history" ?>" class="df-header-more-button df-header-more-button-history" title="역사">
                          <i class="fa-solid fa-clock-rotate-left"></i>
                        </a>
                        <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["move"]["href"] ?? "#") ? $this->data["content_actions"]["move"]["href"] ?? "#" : "/w/특수:이동/" . $this->getSkin()->getTitle() ?>" class="df-header-more-button df-header-more-button-move" title="이동">
                          <i class="fa-solid fa-angles-right"></i>
                        </a>
                        <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["delete"]["href"] ?? "#") ? $this->data["content_actions"]["delete"]["href"] ?? "#" : "/w/" . $this->getSkin()->getTitle() . "?action=delete" ?>" class="df-header-more-button df-header-more-button-delete" title="삭제">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["protect"]["href"] ?? "#") ? $this->data["content_actions"]["protect"]["href"] ?? "#" : "/w/" . $this->getSkin()->getTitle() . "?action=protect" ?>" class="df-header-more-button df-header-more-button-protect" title="보호">
                          <i class="fa-solid fa-lock"></i>
                        </a>
                        <a href="<?php echo ($useDefaultURL && $this->data["content_actions"]["purge"]["href"] ?? "#") ? $this->data["content_actions"]["purge"]["href"] ?? "#" : "/w/" . $this->getSkin()->getTitle() . "?action=purge" ?>" class="df-header-more-button df-header-more-button-purge" title="캐시 삭제">
                          <i class="fa-solid fa-arrows-rotate"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php
                } else { ?>
                  <a href="<?php echo $this->data["content_actions"]["history"]["href"] ?? "#" ?>" class="df-header-button df-header-button-history" title="역사">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="df-header-categories">

            </div>
          </div>
          <section id="content">
            <?php $this->html("bodytext"); ?>
          </section>
        </article>
      </section>
    </div>
    <script>
      const debounce = (fn) => {
        let frame;

        return (...params) => {
          if (frame) cancelAnimationFrame(frame);

          frame = requestAnimationFrame(() => fn(...params));
        }
      };

      const storeScroll = () => document.documentElement.dataset.scroll = window.scrollY;

      document.addEventListener('scroll', debounce(storeScroll), {
        passive: true
      });

      storeScroll();
    </script>
<?php
  }
}
