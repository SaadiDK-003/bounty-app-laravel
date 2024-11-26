$(function () {
    const isDarkMode = window.matchMedia(
        "(prefers-color-scheme: dark)"
    ).matches;
    const theme = isDarkMode ? "light" : "dark";
    const targetTime = $("#flipDownDrawing").data("time");
    new FlipDown(targetTime, "flipDownDrawing", {
        theme: theme,
    })
        .start()
        .ifEnded(() => {
            console.log("The countdown has ended!");
        });

    let Days = $(
        "#flipDownDrawing .rotor-group:nth-child(1) .rotor:nth-of-type(3)"
    )
        .text()
        .trim();
    let Hours = $(
        "#flipDownDrawing .rotor-group:nth-child(2) .rotor:nth-of-type(3)"
    )
        .text()
        .trim();

    if (Days === "0000") {
        console.log("days are now 00");
        $("#flipDownDrawing .rotor-group:nth-child(1)").hide();
    }
    if (Hours === "0000") {
        console.log("days are now 00");
        $("#flipDownDrawing .rotor-group:nth-child(2)").hide();
    }
});
