<footer class="footer">
    <div class="footer__contenido">
    <section class="streaming-radio" style="position: fixed; bottom: 0; background-color: white;">
            <div class="s-buttonsRadio">
                <span id="playRadio">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                        <polygon class="play-btn__svg" points="9.33 6.69 9.33 19.39 19.3 13.04 9.33 6.69"/>
                    </svg> 
                </span>
                <span id="pauseRadio">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                        <path d="M224,432H144V80h80Z"/><path d="M368,432H288V80h80Z"/>
                    </svg>
                </span>
            </div>
    
            <div class="s-titleRadio">
                <span id="positionRadio">PRINZEDOM RADIO</span>
        
            </div>
    
            <div class="s-durationRadio">
                <span id="durationRadio"></span>
            </div>
    
            <iframe class="myAudio" id="my-widget-iframeRadio" width="100%" height="60"  frameborder="0" allow="autoplay" ></iframe>             
        </section>

        <script>

        const loader = document.querySelector(".loading");

        window.addEventListener('load',function(){
            setTimeout(() => {
                loader.classList.remove("radio");
            }, 2500); 
            
        });









    widget =  Mixcloud.PlayerWidget(document.getElementById("my-widget-iframeRadio"));
        
    const programaPlay = document.querySelectorAll('.radio__imagen');
        programaPlay.forEach(element => {
            element.addEventListener("click", function(){



                borrar = document.querySelectorAll(".radio__imagen");
                borrar.forEach(ovrly => {
                    ovrly.classList.remove('overlay-active');    
                }); 

   
                

                radioPlay = document.querySelector('#playRadio')
                radioPlay.classList.remove('radio-active')


                radioPause = document.querySelector('#pauseRadio')
                radioPause.classList.remove('radio-active')
                radioPause.classList.remove('active')
                

                element.classList.add('overlay-active');

                duracionRadio = document.querySelector('#durationRadio')
                duracionRadio.textContent = ""; 

                var url = element.dataset.url;
                changePlayRadio = document.querySelector('#my-widget-iframeRadio');
                changePlayRadio.setAttribute('src', url);

                var radioTextRadio = element.dataset.text;
                changeTextRadio = document.querySelector('.s-titleRadio');
                changeTextRadio.textContent = radioTextRadio
                
                 initStreamer();  

                 function initStreamer() {

                    widget.ready.then(function() {
                
                        // Put code that interacts with the widget here
                        radioPlay = document.querySelector('#playRadio')
                        radioPlay.addEventListener('click', function(){
            
                            widget.play();
            
                           /*  botonesAll = document.querySelectorAll(".s-buttonsPlay");
                            botonesAll.forEach(boton => {
                                boton.classList.add('botones-visibles');  
                            }); */


                            
                    
                           /*  radioMain = document.querySelector('.radio__botones-left')
                            radioMain.nextElementSibling.classList.add('overlayPlayActive') */
            
                            radioPlay.classList.add('radio-active');
            
                            /* radioMain = document.querySelector('.radio__botones-left')
                            radioMain.classList.add('overlayPlayActive') */
                            
                            radioPause = document.querySelector('#pauseRadio');
                            radioPause.classList.remove('active');
                            radioPause.classList.remove('radio-active');
            
            
                            widget.getDuration().then(function(duration) {
                            const result = new Date(duration * 1000).toISOString().slice(11, 19);
            
                            duracion = document.querySelector('#durationRadio')
                            duracion.textContent = result;
            
                            }); 
                        })
            
            
                        radioPause = document.querySelector('#pauseRadio')
                        radioPause.addEventListener('click', function(){
            
                            widget.pause()
                            
                            botonesAll = document.querySelectorAll(".s-buttonsRadio");
                            botonesAll.forEach(boton => {
                                boton.classList.add('botones-visibles');  
                            });
            
                            radioPlay2 = document.querySelector('#playRadio')
                            radioPlay2.classList.remove('active');
                            radioPlay2.classList.remove('radio-active');
                            
                            radioPause.classList.add('active');
                            radioPause.classList.add('radio-active');
            
                            bodyRadio = document.querySelector('body');
                            bodyRadio.classList.remove('reproduciendo-stream'); 
                            bodyRadio.classList.add('pausando-stream');  
                        })  
            
            
                        widget.events.progress.on(progresslistener);
                        function progresslistener() {
                            widget.getPosition().then(function(position) {
                            const result = new Date(position * 1000).toISOString().slice(11, 19);
                                /* const titulo = document.querySelector('#positionRadio');
                                titulo.textContent = `- ${result}` */
                            });
                        }
                    });
                }
            })
        })  
</script>



        
    </div>

</footer>