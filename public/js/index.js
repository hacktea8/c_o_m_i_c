var moneys = new Array();
createMoney(moneys, 3);

moneys[0].enable = false;


moneys[1].enable = true;
moneys[1].type = "iframe";
moneys[1].src = "/v2/money/37cs_736x90.html";
moneys[1].width = "100%";
moneys[1].height = "92";

moneys[2].enable = false;
moneys[2].type = "iframe";
moneys[2].src = '/v2/money/baidu/960x600.html';
moneys[2].width = "960";
moneys[2].height = "76";