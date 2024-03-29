!(function (n) {
    n(window.document).ready(function () {
        Clappr.Browser.isiOS;
        var i,
            e,
            t,
            o,
            a = Clappr.Browser.isiOS,
            p = "@media screen and (orientation:landscape){video{object-fit:fill!important}}",
            r = [LevelSelector],
            d = {
                back_to_live: "Go back to live stream",
                default_error_message: "Stream has a problem.",
                default_error_title: "Hassss!",
                disabled: "Blocked",
                live: "Live",
                playback_not_supported: "Your browser is not supporting JS Player.",
            };
        Clappr.Browser.isiOS && n("#reload").css("left", "56px"),
            a && window.screen.height > window.screen.width && (p = ""),
            n("#reload").show(),
            (window.app = {
                log: function () {},
                clappr: {
                    currentTime: function () {
                        return window.app.log("currentTime"), window.Math.round(window.app.clappr.instance.getCurrentTime(), 0);
                    },
                    instance: new Clappr.Player({}),
                    isBuffering: function () {
                        return window.app.log("isBuffering"), window.app.clappr.instance.core.mediaControl.container.buffering;
                    },
                    resizeCallback: function () {
                        window.app.log("resizeCallback"), window.app.clappr.instance.resize({ height: n(window).innerHeight(), width: n(window).innerWidth() });
                    },
                    options: {
                        autoPlay: !1,
                        allowUserInteraction: a,
                        chromeless: a,
                        disableErrorScreen: !1,
                        disableKeyboardShortcuts: !0,
                        disableVideoTagContextMenu: !1,
                        exitFullscreenOnEnd: !1,
                        height: "100%",
                        language: "tr-TR",
                        persistConfig: !1,
                        playback: { controls: a, playInline: !0, recycleVideo: Clappr.Browser.isMobile, hlsjsConfig: { debug: !1, liveSyncDurationCount: 2, maxBufferLength: 20, maxBufferSize: 0 } },
                        plugins: r,
                        mediacontrol: { buttons: "#fff", seekbar: "#fff" },
                        mute: !1,
                        strings: { tr: d, "tr-TR": d },
                        width: "100%",
                    },
                },
                bInterval: 0,
                cInterval: 30,
                extend: function (i, e) {
                    return window.app.log("extend"), n.extend({}, i, e);
                },
                init: function () {
                    window.app.log("init"),
                        n(window.document.head).append('<style>body{background-color:transparent;font-family:"Roboto";overflow:hidden}' + p + "</style>"),
                        (window.config = window.app.extend({ advertisement: window.adsConfig }, window.config)),
                        window.config.advertisement.enabled ? window.app.initAdvertisement() : window.app.initMain(),
                        n(window).on("resize", window.app.clappr.resizeCallback),
                        window.app.clappr.resizeCallback();
                },
                initAdvertisement: function () {
                    window.app.log("initAdvertisement"),
                        window.app.initContainer(window.config.advertisement.parentId),
                        (window.config.advertisement = window.app.extend({ link: "", skipOffset: 5, skipText: "Skip Ads", skipTextN: "Skip ads after %d " }, window.config.advertisement)),
                        (window.app.clappr.instance = new Clappr.Player(window.app.extend(window.app.clappr.options, window.app.extend(window.config.advertisement, { chromeless: a })))),
                        window.app.initAdvertisementEvents();
                },
                initAdvertisementEvents: function () {
                    window.app.log("initAdvertisementEvents"),
                        window.app.clappr.instance.once(Clappr.Events.PLAYER_ENDED, window.app.skip),
                        window.app.clappr.instance.once(Clappr.Events.PLAYER_PLAY, window.app.initSkipButton),
                        window.app.clappr.instance.on(Clappr.Events.PLAYER_TIMEUPDATE, window.app.skipButton),
                        window.app.clappr.instance.setVolume(35);
                },
                initContainer: function (i) {
                    window.app.log("initContainer"), n(i).length > 0 && n(i).remove(), n(window.document.body).prepend(n("<div />").attr("id", i.match(/\#(.*)/)[1]));
                },
                initMain: function () {
                    window.app.log("initMain"),
                        window.app.initContainer(window.config.main.parentId),
                        (window.app.clappr.instance = new Clappr.Player(window.app.extend(window.app.clappr.options, window.config.main))),
                        window.app.initMainEvents(),
                        window.config.main.hasOwnProperty("reklamResim") &&
                            window.config.main.hasOwnProperty("reklamGidis") &&
                            (n("#m .container").prepend(
                                '<div data-free-banner><div data-f-cl><a data-free-close href="javascript:void(0)">&times;</a></div><a href="' +
                                    window.config.main.reklamGidis +
                                    '" target="_blank"><img src="' +
                                    window.config.main.reklamResim +
                                    '"></a></div>'
                            ),
                            n("[data-free-close]").on("click", function (i) {
                                return i.preventDefault(), n("[data-free-banner]").hide(), !1;
                            }));
                },
                initMainCleanup: function () {
                    window.app.log("initMainCleanup"), n(".bar-scrubber").css({ display: "none" }), n("[data-watermark-top-left]").css({ left: "37px", top: "37px" }), n("[data-watermark-top-right]").css({ top: "37px" });
                },
                initMainEvents: function () {
                    window.app.log("initMainEvents"), window.app.clappr.instance.once(Clappr.Events.PLAYER_PLAY, window.app.initMainCleanup);
                },
                initMainOnErrorCallback: function () {
                    window.app.log("initMainOnErrorCallback");
                },
                initSkipButton: function () {
                    window.app.log("initSkipButton"),
                        (t = window.config.advertisement.skipOffset),
                        Clappr.Browser.isMobile || n("[data-playpause]").css({ display: "none" }),
                        n(window.document.body).prepend(n("<div data-advertisement-link />").css({ height: "100%", left: 0, position: "absolute", top: 0, "z-index": 9998, width: "100%" })),
                        n("[data-advertisement-link]").append(n("<a />").attr({ href: window.config.advertisement.link, target: "_0" }).css({ display: "inline-block", height: "100%", width: "100%" })),
                        n(window.document.body).prepend(n("<div data-advertisement />").css({ bottom: "25%", position: "absolute", right: 0, "z-index": 9999 })),
                        (o = window.config.advertisement.skipTextN.replace("%d", window.config.advertisement.skipOffset).toUpperCase()),
                        n("[data-advertisement]").append(
                            n("<button />")
                                .attr("type", "button")
                                .css({ "background-color": "#000", border: "3px solid #333", "border-right": 0, color: "#f8f8f8", "font-family": "Roboto", "font-weight": "bold", "font-size": "68%", padding: "10px 20px" })
                                .text(o)
                        );
                },
                skip: function () {
                    window.app.log("skip"), n("[data-advertisement]").remove(), n("[data-advertisement-link]").remove(), window.app.initMain();
                },
                skipButton: function () {
                    window.app.log("skipButton"),
                        window.app.clappr.currentTime() > 0 && ((i = 1), (e = setInterval(window.app.skipButtonHandler, 1e3)), window.app.clappr.instance.off(Clappr.Events.PLAYER_TIMEUPDATE, window.app.skipButton));
                },
                skipButtonHandler: function () {
                    if ((window.app.log("skipButtonHandler"), window.app.clappr.isBuffering())) return !1;
                    i == t
                        ? ((o = window.config.advertisement.skipText), n("[data-advertisement] > button").css({ cursor: "pointer" }), n("[data-advertisement] > button").on("click", window.app.skip), clearInterval(e))
                        : ((o = window.config.advertisement.skipTextN.replace("%d", t - i)), i++),
                        n("[data-advertisement] > button").text(o.toUpperCase());
                },
            }),
            (window.config = {
                advertisement: window.adsConfig,
                main: window.app.extend(
                    { parentId: "div#m", source: "" },
                    (function (n) {
                        var i,
                            e = {},
                            t = /&/.test(n);
                        if (n.length > 1 && /=/.test(n))
                            if (t)
                                for (var o = n.substring(1).split("&"), a = 0; a < o.length; a++)
                                    (i = /^(.*?)=(.*?)$/.exec(o[a])), /^(?!.*posxtion).*$/i.test(i[1]) && (/^http\:.*/i.test(decodeURIComponent(i[2])) || (e[i[1]] = decodeURIComponent(i[2])));
                            else (i = /^(.*?)=(.*?)$/.exec(n.substring(1))), /^(?!.*posxtion).*$/i.test(i[1]) && (/^http\:.*/i.test(decodeURIComponent(i[2])) || (e[i[1]] = decodeURIComponent(i[2])));
                        return e;
                    })(window.location.hash)
                ),
            });
        var w = window.faceStreams[Math.floor(Math.random() * window.faceStreams.length)];
        window.config.main.hasOwnProperty("poster") && (window.config.advertisement.poster = window.config.main.poster),
            window.facePlay && /steam/.test(w)
                ? ((window.config.main.source = w), window.app.init())
                : !window.facePlay || Clappr.Browser.isiOS || Clappr.Browser.isSafari
                ? (window.hasOwnProperty("mainSource") && (window.config.main.source = window.mainSource[Math.floor(Math.random() * window.mainSource.length)]), void 0 !== window.config.main.source && window.app.init())
                : ((window.config.main.source = w), window.app.init());
    });
})(jQuery);
