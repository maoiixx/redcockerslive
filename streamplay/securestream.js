  window.onload = function () {

        var  domain = (new URL(document.referrer)).hostname;

        if (!['www.jcool.live','www.hnhtalpakan.live', 'www.agtalpakan.live', 'www.sph88.live', 'www.wdslasher.live'].includes(domain)) {

                window.location.replace("https://www.youtube.com/embed/BjUn6pu74wc?autoplay=1");

	}else{
		var blobMe= URL['createObjectURL'](new Blob([''], {type: 'text/html'}));
		var elIframe = document['createElement']('iframe');
		elIframe['setAttribute']('frameborder', '0');
		elIframe['setAttribute']('width', '100%');
		elIframe['setAttribute']('height', '360px');
		elIframe['setAttribute']('src', blobMe);
		var idOne= 'gepa_'+ Date.now();
		elIframe['setAttribute']('id', idOne);
		elIframe['setAttribute']('class', "responsive-iframe");
		document.getElementById('esportwdhtml').appendChild(elIframe);
		const iframeHere= 'https://seya25.live:5443/WebRTCAppEE/play.html?autoplay=true&targetLatency=0&name=wdslasher';
		document['getElementById'](idOne)['contentWindow']['document'].write('<script type="text/javascript">location.href = "' + iframeHere + '";</script>')
	}


  };
