!(function (a) {
    "use strict";

    function n() {
    }

    (n.prototype.init = function () {
        a("#world-map-markers").vectorMap({
            map: "philippines_mill", // Changed to the Philippines map
            normalizeFunction: "polynomial",
            hoverOpacity: 0.7,
            hoverColor: !1,
            regionStyle: {
                initial: {
                    fill: "#f5f6fb",
                    stroke: "#e9eaf0",
                    "stroke-width": 1,
                    "stroke-opacity": 0.8
                }
            },
            markerStyle: {
                initial: {
                    r: 9,
                    fill: "#50a5f1",
                    "fill-opacity": 0.9,
                    stroke: "#fff",
                    "stroke-width": 7,
                    "stroke-opacity": 0.4
                },
                hover: {
                    stroke: "#fff",
                    "fill-opacity": 1,
                    "stroke-width": 1.5
                }
            },
            backgroundColor: "transparent",
            markers: [
                // Replace latLng with Davao del Sur's points of interest
                {latLng: [6.7497, 125.3542], name: "Digos City, Davao del Sur"},
                {latLng: [6.6145, 125.3744], name: "Bansalan, Davao del Sur"},
                {latLng: [6.8000, 125.3000], name: "Hagonoy, Davao del Sur"},
                {latLng: [6.5514, 125.4483], name: "Kiblawan, Davao del Sur"},
                {latLng: [6.7657, 125.4783], name: "Magsaysay, Davao del Sur"},
                {latLng: [6.6620, 125.3272], name: "Matanao, Davao del Sur"},
                {latLng: [6.6741, 125.2257], name: "Padada, Davao del Sur"},
                {latLng: [6.8300, 125.2867], name: "Santa Cruz, Davao del Sur"},
                {latLng: [6.5800, 125.4033], name: "Sulop, Davao del Sur"},
            ],
        });
    }),
        (a.VectorMap = new n()),
        (a.VectorMap.Constructor = n);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.VectorMap.init();
    })();
