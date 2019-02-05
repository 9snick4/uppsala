<div class="container">
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
             It's a separate element as animating opacity is faster than rgba(). -->
        <div id="modal" class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <a class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </a>

                <a class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </a>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

</div>
   
<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
<!-- <% loop CatalogoGiochi %>  io facevo un loop, tu puoi fare copia incolla per ogni immagine -->    
        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="$Picture.URL" alt="$Description" title="$Description" itemprop="contentUrl" data-size="$Picture.Width x $Picture.Height">
                <image src="$Picture.URL" class="col-sm-6 gallery-image" itemprop="thumbnail" id="$Posizione" alt="immagine $Posizione" />
            </a>
            <figcaption class="hide" itemprop="caption description">$Description</figcaption>
        </figure>    
<!-- <% end_loop %> -->
</div>

<!-- 
    Per avere una galleria di immagini molto figa, aggiungi 
        <figure
            <a
                <image
            </a>
            <figcaption>
        </figure>
        per ogni immagine e cambia i valori dinamici con i valori che vuoi tu
        per farlo ancora piu figo potresti aggiungere le immagini al DB e prendere i valori dinamicamente (come faccio qui)

        figcaption class=hide serve per nascondere la caption sul template ma non quando si visualizza (fa tap) sull'immagine
-->
