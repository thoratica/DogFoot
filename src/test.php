<?php

class DogFootTemplate extends BaseTemplate
{
  public function execute()
  {
    // $this->data['content_actions']['nstab-main']['text'] = wfMessage('view')->parse();
    // $this->html('headelement'); 
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="min-h-screen w-full">
      <nav className='sticky flex items-center h-16 bg-gray-900'>
        <div className='mx-auto px-3 xs:px-6 flex max-w-7xl w-max xs:w-full'>
          <a className='outline-none focus:filter focus:brightness-95 transition-all'>
            <img src="<?php $this->text('logopath'); ?>" class="h-6" />
          </a>
        </div>
      </nav>
    </div>

    </html>
<?php
  }
}
