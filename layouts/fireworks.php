<div class="firework"></div>
<div class="firework2"></div>
<div class="firework3"></div>

<style>

@keyframes firework {
  0% { 
    transform: translate(-50%, 60vh);
    width: 0.5vmin;
    opacity: 1;
  }
  50% { 
    width: 0.5vmin;
    opacity: 1;
  }
  100% { 
    width: 45vmin; 
    opacity: 0; 
  }
}

.firework,
.firework::before,
.firework::after {
  --top: 60vh;
  content: "";
  position: fixed;
  z-index: 99999999999999;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 0.5vmin;
  aspect-ratio: 1;
  background:
    /* random backgrounds */
    radial-gradient(circle, #ff0 0.2vmin, #0000 0) 50% 00%,
    radial-gradient(circle, #ff0 0.3vmin, #0000 0) 00% 50%,
    radial-gradient(circle, #ff0 0.5vmin, #0000 0) 50% 99%,
    radial-gradient(circle, #ff0 0.2vmin, #0000 0) 99% 50%,
    radial-gradient(circle, #ff0 0.3vmin, #0000 0) 80% 90%,
    radial-gradient(circle, #ff0 0.5vmin, #0000 0) 95% 90%,
    radial-gradient(circle, #ff0 0.5vmin, #0000 0) 10% 60%,
    radial-gradient(circle, #ff0 0.2vmin, #0000 0) 31% 80%,
    radial-gradient(circle, #ff0 0.3vmin, #0000 0) 80% 10%,
    radial-gradient(circle, #ff0 0.2vmin, #0000 0) 90% 23%,
    radial-gradient(circle, #ff0 0.3vmin, #0000 0) 45% 20%,
    radial-gradient(circle, #ff0 0.5vmin, #0000 0) 13% 24%
    ;
  background-size: 0.5vmin 0.5vmin;
  background-repeat: no-repeat;
  animation: firework 2s infinite;
}
.firework::before {
  transform: translate(-50%, -50%) rotate(25deg) !important; 
}

.firework::after {
  transform: translate(-50%, -50%) rotate(-37deg) !important;
}

.firework2,
.firework2::before,
.firework2::after {
  --top: 50vh;
  content: "";
  position: fixed;
  z-index: 99999999999999;
  top: 50%;
  left: 20%;
  transform: translate(-50%, -50%);
  width: 0.5vmin;
  aspect-ratio: 1;
  background:
    /* random backgrounds */
    radial-gradient(circle, #ff00c4 0.2vmin, #0000 0) 50% 00%,
    radial-gradient(circle, #ff00c4 0.3vmin, #0000 0) 00% 50%,
    radial-gradient(circle, #ff00c4 0.5vmin, #0000 0) 50% 99%,
    radial-gradient(circle, #ff00c4 0.2vmin, #0000 0) 99% 50%,
    radial-gradient(circle, #ff00c4 0.3vmin, #0000 0) 80% 90%,
    radial-gradient(circle, #ff00c4 0.5vmin, #0000 0) 95% 90%,
    radial-gradient(circle, #ff00c4 0.5vmin, #0000 0) 10% 60%,
    radial-gradient(circle, #ff00c4 0.2vmin, #0000 0) 31% 80%,
    radial-gradient(circle, #ff00c4 0.3vmin, #0000 0) 80% 10%,
    radial-gradient(circle, #ff00c4 0.2vmin, #0000 0) 90% 23%,
    radial-gradient(circle, #ff00c4 0.3vmin, #0000 0) 45% 20%,
    radial-gradient(circle, #ff00c4 0.5vmin, #0000 0) 13% 24%
    ;
  background-size: 0.5vmin 0.5vmin;
  background-repeat: no-repeat;
  animation: firework 4s infinite;
}
.firework2::before {
  transform: translate(-50%, -50%) rotate(25deg) !important; 
}

.firework2::after {
  transform: translate(-50%, -50%) rotate(-37deg) !important;
}


.firework3,
.firework3::before,
.firework3::after {
  --top: 40vh;
  content: "";
  position: fixed;
  z-index: 99999999999999;
  top: 50%;
  left: 70%;
  transform: translate(-50%, -50%);
  width: 0.5vmin;
  aspect-ratio: 1;
  background:
    /* random backgrounds */
    radial-gradient(circle, #ff005a 0.2vmin, #0000 0) 50% 00%,
    radial-gradient(circle, #ff005a 0.3vmin, #0000 0) 00% 50%,
    radial-gradient(circle, #ff005a 0.5vmin, #0000 0) 50% 99%,
    radial-gradient(circle, #ff005a 0.2vmin, #0000 0) 99% 50%,
    radial-gradient(circle, #ff005a 0.3vmin, #0000 0) 80% 90%,
    radial-gradient(circle, #ff005a 0.5vmin, #0000 0) 95% 90%,
    radial-gradient(circle, #ff005a 0.5vmin, #0000 0) 10% 60%,
    radial-gradient(circle, #ff005a 0.2vmin, #0000 0) 31% 80%,
    radial-gradient(circle, #ff005a 0.3vmin, #0000 0) 80% 10%,
    radial-gradient(circle, #ff005a 0.2vmin, #0000 0) 90% 23%,
    radial-gradient(circle, #ff005a 0.3vmin, #0000 0) 45% 20%,
    radial-gradient(circle, #ff005a 0.5vmin, #0000 0) 13% 24%
    ;
  background-size: 0.5vmin 0.5vmin;
  background-repeat: no-repeat;
  animation: firework 3s infinite;
}
.firework3::before {
  transform: translate(-50%, -50%) rotate(25deg) !important; 
}

.firework3::after {
  transform: translate(-50%, -50%) rotate(-37deg) !important;
}
</style>