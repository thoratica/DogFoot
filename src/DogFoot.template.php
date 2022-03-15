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
    $this->data["content_actions"]["nstab-main"]["text"] = wfMessage("view")->parse();
    $this->html("headelement");
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
                <?php echo json_encode($this->data["content_actions"]) ?>
                <?php
                if ($this->getSkin()->getUser()->isRegistered()) {
                ?>
                  <a id="ca-edit" href="<?php echo $this->data["content_actions"]["ve-edit"]["href"] ?? "#" ?>" class="df-header-button df-header-button-veditor" title="시각 편집 모드">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="<?php echo $this->data["content_actions"]["edit"]["href"] ?? "#" ?>" class="df-header-button df-header-button-editor" title="원본 편집 모드">
                    <i class="fa-solid fa-pen"></i>
                  </a>

                  <div class="df-header-more-menu">
                    <button class="df-header-button df-header-button-more" title="더보기">
                      <i class="fa-solid fa-caret-down"></i>
                    </button>
                    <div class="df-header-buttons-more-wrapper">
                      <div class="df-header-buttons-more">
                        <a href="<?php echo $this->data["content_actions"]["history"]["href"] ?? "#" ?>" class="df-header-more-button df-header-more-button-history" title="역사">
                          <i class="fa-solid fa-clock-rotate-left"></i>
                        </a>
                        <a href="<?php echo $this->data["content_actions"]["move"]["href"] ?? "#" ?>" class="df-header-more-button df-header-more-button-move" title="이동">
                          <i class="fa-solid fa-angles-right"></i>
                        </a>
                        <a href="<?php echo $this->data["content_actions"]["delete"]["href"] ?? "#" ?>" class="df-header-more-button df-header-more-button-delete" title="삭제">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="<?php echo $this->data["content_actions"]["protect"]["href"] ?? "#" ?>" class="df-header-more-button df-header-more-button-protect" title="보호">
                          <i class="fa-solid fa-lock"></i>
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
              <?php
              $html = $this->data["skin"]->getCategoryLinks();

              if ($html !== "") {
                $tmplist1 = explode("<li><a href=\"", explode("</ul>", explode("<ul>", $html)[1])[0]);

                array_shift($tmplist1);

                foreach ($tmplist1 as $tmp1) {
                  $tmplist2 = explode("\" title=\"", $tmp1);
                  $tmplist3 = explode("\">", $tmplist2[1]);
                  $tmplist4 = explode("\" class=\"", $tmplist2[0]);
                  $tmplist5 = explode("</a></li>", $tmplist3[1]);

                  $href = $tmplist4[0];
                  $title = $tmplist3[0];
                  $exists = sizeof($tmplist4) >= 2 && $tmplist4[1] === "new";
                  $text = $tmplist5[0];
              ?>
                  <a href="<?php echo $href ?>" class="df-header-category<?php echo $exists ? " df-header-category-new" : "" ?>" title="<?php echo $title ?>"><?php echo $text ?></a>
              <?php
                }
              }
              ?>
            </div>
          </div>
          <section id="content">
            <div id="mw-content-text">
              <?php $this->html("bodytext"); ?>
            </div>
          </section>
        </article>
      </section>
    </div>

    </html>
<?php
  }
}
