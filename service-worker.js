'use strict';var QUVU_SW = {serverUrl: 'https://demo.quvu.com/api/',company_id: '57a0ac84b13939585631c62a',website_id: '57a0aca1b13939585631c62c'};
self.addEventListener('push', function(event) {
    QUVU_SW.responseCode = '';
    event.waitUntil(
        self.registration.pushManager.getSubscription().then(function(subscription) {
            var url = '';
            url = QUVU_SW.serverUrl + 'notifications/' + QUVU_SW.website_id + '/getMessage?type=push_msg';
            console.log(subscription)
            console.log("url :", url)
            return fetch(url)
                .then(function(response) {
                    if (response.status !== 200) {
                        QUVU_SW.responseCode = response.status;
                        console.log('Looks like there was a problem. Status Code: ' + response.status);
                        throw new Error('Status Code: ' + response.status);
                    }
                    return response.json().then(function(data) {
                        if (data.error || !data.notification) {
                            console.error('The API returned an error.', data.error);
                            throw new Error();
                        }
                        console.log(data)
                        var src = "data:image/jpeg;base64,";
                        src = src + data.notification.icon;
                        var notificationDetails = {};
                        notificationDetails.data = {};
                        notificationDetails.title = data.notification.title;
                        notificationDetails.message = data.notification.message;
                        notificationDetails.icon = src;
                        notificationDetails.notificationTag = data.notification.tag;
                        notificationDetails.url = data.notification.url;
                        notificationDetails.requireInteraction = true;

                        var options = {
                            body: notificationDetails.message,
                            icon: notificationDetails.icon,
                            requireInteraction: notificationDetails.requireInteraction,
                            tag: notificationDetails.notificationTag,
                            url: notificationDetails.url,
                            data: {
                                url: notificationDetails.url
                            }
                        };
                        if (data.notification.hasOwnProperty('requireInteraction') && data.notification.requireInteraction === false) {
                            notificationDetails.requireInteraction = false;
                        }
                        if(data.notification.timeout)
                        self.registration.showNotification(notificationDetails.title, options)
                        .then(function(){
                          console.log(self.registration.getNotifications())
                          return self.registration.getNotifications()})
                        .then(function(notifications) {
                              console.log(notifications)
                              setTimeout(function() { notifications.forEach(notification => notification.close())},timeout);
                            })
                        else {
                          self.registtration.showNotification(notificationDetails.title,options)
                        }
                        if(subscription && subscription.endpoint)
                            {
                        var endpoint = subscription.endpoint;
                        console.log(endpoint)
                        var id;
                        if (firefoxchk())
                            id = endpoint.substring(47);
                        if (chromechk())
                            id = endpoint.substring(40);
                        var action = 'recieved';
                        var query = 'action=' + action + '&websiteId=' + QUVU_SW.website_id + '&registerID=' + id + '&message=' + options.body;
                        fetch(QUVU_SW.serverUrl + 'statuses/response?' + query)
                            .then(function(response) {
                                console.log(response)
                            })
                        }
                        else {
                          console.log('else main hoon')
                          console.log('error hain bacchu')

                        }
                    })
                }).
            catch (function(err) {
                console.error("testing", err);
                console.log('Using Default Notification');
                return self.registration.showNotification(QUVU_SW.siteUrl, {
                    body: 'testing',
                    //  icon: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAOVBMVEUAAABclelclelclelclelclelclelclelclelclelclelclelclelclelclelclelclelclelclelYm2gmAAAAEnRSTlMA4ZALGVUpsJ/ygGdFOcm+1HSpV47jAAADOklEQVRYw+2X3ZKkIAyFJfyDCOb9H3Y1sRFanXV6vdmqPhczPXTxkeSEUDN89dVXXw1Kx3/ab5J6J4LQn/MsIsL7YsSsPuQBrrLvyyP6z4KUSDrGqBHDJ8CIm8btANWEDp9VkCU2oIY0sMQnMY5YFV+5Cscf0rL42zom3OVr06AwNXr5UXyssRK3z4bsvys20jXAaTCyHkTEvKym+7x52WawkTIwV6vMlsF0m7cEN1PXVIVBFUFBKnZdeiTyHZlCFjYpM8MzwK14/trd7WeRKLdWab053mx+KM5Z3JlPC8fJ4Q3IQUUmTPQXXUxzx90y1kI2mviCOE7BMxfjjfDm3RkjWp8ZZTjn5dDw9yLOiHYfdQEpLRbfNMndXGg26L81jhYoxs6cRJtYHIylSIG46mdXNJW6W1krlPsiaopUM0lQLU+l5rLsMO/TAdoR4bcrDLVxpivgaE8nvaKl3ZfEPmfuGEP5nwBNKLgqH7/ynqzphqLFwqcY6it/HhyeD7e85mW61h6AqlcICEcgNB4eFei+edxkaY2A08ts0UVnXNtlRyVaLbipcC8Vit1LApamdtbFbiQfJSnu3D1Vmton009onJRuYdgeeOFKTcNLAvIhloFhfzCsoACvU6YdlFjrWySzJyJB3SazgHma++l0IoO6BSo2iuqqOXa1nQzROrtHeHnL1/xsB7QUJ0drqydlDq4DXj2y2S/pdUCxnqz4/Kk2G2qA8AaE88deDqIFShy5FHwN0wsY55wmjZ3Mqc8wdCM2imrWoPa2LiIJVWIPFGdEEAbbtoFIoVluybBPOmNHGyz2gqSUlF0xpRDtS6oIobziOOkXSRQI4xTwVF5MbtZbvHPXCMnQGnvRDiiZEQU60ZNcAJeLeHFzWLf71jZJm4OiOPuqp2BzDg2xvZdJz5AJCir598tk2Fuwx8svpY4aXjvm93ui1xSy301myS1Jc/kYi+tOlJGn13Gk//QPkKounknB2TySSQ7XCrVIp0rTMf6fcHXM2+FKEfTwK7mtSo9J1+v8kOTWy+oxYqmP6UMCBsLTRZweAxp8OmdR3+eHNOPDnSPx6d4e+fql54gKhPcIw1dfffV/6A8Mx1FKxiVRkAAAAABJRU5ErkJggg==",
                    tag: "default-notification-tag"
                });
            });
        })
    );
});

self.addEventListener('notificationclick', function(event) {
    console.log('On notification click: ', event.notification.tag);
    var url=event.notification.data.url;
    var message=event;
  //  console.log(url,message,'fsadkfja')
    event.notification.close();
    event.waitUntil(
        clients.matchAll({
            type: 'window'
        })
            .then(function(windowClients) {
                for (var i = 0; i < windowClients.length; i++) {
                    var client = windowClients[i];
                    if (client.url === url && 'focus' in client) {
                        return client.focus();
                    }
                }
                if (clients.openWindow) {
                    return clients.openWindow(url);
                }
            })
    );
    self.registration.pushManager.getSubscription().then(function(subscription) {
        var endpoint = subscription.endpoint;
        var id;
        if(firefoxchk())
            id = endpoint.substring(47);
        if(chromechk())
            var id = endpoint.substring(40);
        var action='clicked';
        var query='action='+action+'&websiteId='+QUVU_SW.website_id+'&registerID='+id+'&message='+event.notification.body;
        console.log(query,'clicked');
        return fetch(QUVU_SW.serverUrl + 'statuses/response?'+query)
            .then(function(response){
                console.log(response)
            })
    })

});




function getBrowser() {
    var nVer = navigator.appVersion;
    var nAgt = navigator.userAgent;
    var browserName = navigator.appName;
    var fullVersion = '' + parseFloat(navigator.appVersion);
    var majorVersion = parseInt(navigator.appVersion, 10);
    var nameOffset, verOffset, ix;
    var fullv = '';

    // In Opera 15+, the true version is after "OPR/"
    if ((verOffset = nAgt.indexOf("OPR/")) != -1) {
        browserName = "Opera";
        fullVersion = nAgt.substring(verOffset + 4);
    }
    // In older Opera, the true version is after "Opera" or after "Version"
    else if ((verOffset = nAgt.indexOf("Opera")) != -1) {
        browserName = "Opera";
        fullVersion = nAgt.substring(verOffset + 6);
        if ((verOffset = nAgt.indexOf("Version")) != -1)
            fullVersion = nAgt.substring(verOffset + 8);
    }
    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
        browserName = "Microsoft Internet Explorer";
        fullVersion = nAgt.substring(verOffset + 5);
    }
    // In Chrome, the true version is after "Chrome"
    else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
        browserName = "Chrome";
        fullVersion = nAgt.substring(verOffset + 7);
        if (/(.*?)wv\)/.test(nAgt)) {
            fullv = '22';
        }
    }
    // In Safari, the true version is after "Safari" or after "Version"
    else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
        browserName = "Safari";
        fullVersion = nAgt.substring(verOffset + 7);
        if ((verOffset = nAgt.indexOf("Version")) != -1)
            fullVersion = nAgt.substring(verOffset + 8);
    }
    // In Firefox, the true version is after "Firefox"
    else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
        browserName = "Firefox";
        fullVersion = nAgt.substring(verOffset + 8);
    }
    // In most other browsers, "name/version" is at the end of userAgent
    else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) <
        (verOffset = nAgt.lastIndexOf('/'))) {
        browserName = nAgt.substring(nameOffset, verOffset);
        fullVersion = nAgt.substring(verOffset + 1);
        if (browserName.toLowerCase() == browserName.toUpperCase()) {
            browserName = navigator.appName;
        }
    }
    // trim the fullVersion string at semicolon/space if present
    if ((ix = fullVersion.indexOf(";")) != -1)
        fullVersion = fullVersion.substring(0, ix);
    if ((ix = fullVersion.indexOf(" ")) != -1)
        fullVersion = fullVersion.substring(0, ix);

    majorVersion = parseInt('' + fullVersion, 10);
    if (isNaN(majorVersion)) {
        fullVersion = '' + parseFloat(navigator.appVersion);
        majorVersion = parseInt(navigator.appVersion, 10);
    }
    if (fullv == '22') {
        majorVersion = fullv;
    }
    return browserName + "-" + majorVersion;
}



function firefoxchk() {
    var checkFirefox = 0;
    var br = getBrowser();
    var brSplit = br.split("-");
    console.log(brSplit)
    if (brSplit[0] == "Firefox" && brSplit[1] >= "44") {
        checkFirefox = 1;
    }
    //console.log(brSplit,checkFirefox)
    return checkFirefox;
}

function chromechk() {
    var checkChrome = 0;
    var br = getBrowser();
    var brSplit = br.split("-");

    if (brSplit[0] == "Chrome" && brSplit[1] >= "42") {
        checkChrome = 1;
    }
    return checkChrome;
}
