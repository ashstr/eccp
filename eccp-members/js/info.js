
// Usage:

// -------------------------------------------------
// Count down to a date
// -------------------------------------------------
var test1 = new Countdown({
                              year : 2013,
                              month : 1,
                              day : 1,
                              hour : 0,
                              ampm : "am",
                              minute : 0,
                              second : 0 // < - no comma on last item!!
                         });
// -------------------------------------------------
// Count down number of seconds
// -------------------------------------------------
var test2 = new Countdown( { style: "flip", time: 3600 } );
// -------------------------------------------------
// Advanced Options
// -------------------------------------------------
function countdownComplete(){
   alert("yo");
}
var myCD2 = new Countdown({
                         // Using "number of seconds"
                         time   : 15, // Total number of seconds to count down.
                         //
                         // --- OR ---
                         //
                         // Using a "dead line" date (NOTE: If "time" set this dealine date will NOT be used ("time" over-rides date))
                         year   : 2013,  // The target date's year (optional)
                         month  : 1,     // The target date's month (optional)
                         day    : 1,     // The target date's day (optional)
                         hour   : 0,     // The target date's hour (optional)
                         ampm   : "am",  // Is the hour refeing to AM (early/day) or PM (late/night)?
                         minute : 0,          // The target date's minutes (optional)
                         second : 0,          // The target date's seconds (optional)
                        
                         // ---------------------------------
                         // Optional settings
                         // ---------------------------------	
                         width    : 200,      // Defaults to 200 x 30 pixels, you can specify a custom size here
                         height   : 30,       //
                         inline   : true,     // If inline, text will wrapp around object, otherwise this countdown object will consume the entire "line"
                         target   : "foo",    // A reference to an html DIV id (e.g. DIV id="foo")
                         style    : "boring", // flip boring whatever (only "flip" uses image/animation)
                         rangeHi  : "year",   // The highest unit of time to display
                         rangeLo  : "second", // The lowest unit of time to display
                         padding  : 0.4,             // Padding between the digits and the background box. Value reflects a percentage of overall height.
                         onComplete : countdownComplete, // Specify a function to call when done
                         numberMarginTop : 5.5,
                        
                         numbers : {
                             font    : "Arial",    // Arial Times Verdana etc... see "numberMarginTop" above to correct vertical centering
                             color   : "#FFFFFF",
                             bkgd    : "#000000", // May also use an array of gradient stops [["#hex", alpha, stop],["#000", 0.5, 100]] (stop range is 0-100)
                             rounded : 3,
                             shadow  : [0,0,10, "#000000", 0.5] // < - no comma on last item!
                         },
                         labels : {
                             font   : "Arial",
                             color  : "#000000",
                             weight : "normal" // < - no comma on last item!
                         },
                         bkgd : {
                             color   : "#000000",
                             rounded : 3,
                             shadow  : [0,0,10, "#000000", 0.5] // < - no comma on last item!
                         } // < - no comma on last item!
                    });
 