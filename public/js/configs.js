var pVars = pVars || {
    'servs': [
        { 'name': '���Ţ�', 'host': '' },
        { 'name': '���Ţ�', 'host': '' },
        { 'name': '���Ţ�', 'host': '' },
        { 'name': '�㶫����', 'host': '' },
        { 'name': '���յ���', 'host': '' },
        { 'name': '��ͨ', 'host': '' }
    ],
	'servsLen': 6,
    'root': 'http://mh.hacktea8.com',
    'page': 1,
    'curServ': 0,
    'defServ': 0,
    'priServ': 3,
    'curFile': '',
	'dblClick': 1,
    'skin': 0,
    'IMG_ERR_MSG': '<div class="img-err-msg"><h3>:( �ǳ���Ǹ��ͼƬ����ʧ���ˡ�</h3><ol><li>�볢�԰�����F5������<a href="javascript:;" onclick="location.reload();">����˴�</a>ˢ�±�ҳ�档</li><li>�볢�Ե���Ҳ�ķ������ڵ��л����ٶȸ���ķ�������</li></ol></div>'
};


(function () {
    var language = (navigator.language || navigator.userLanguage || navigator.browserLanguage).toLowerCase();
    if (/(zh-hk|ja)/gi.test(language)) {
        location.href = '/';
    }
})();