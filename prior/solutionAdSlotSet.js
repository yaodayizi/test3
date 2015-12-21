var __app = __app || {};
// Module adSlotSet
__app['adSlotSet'] = (function(window, undefined) {

    var _genUnselectedIds = function(arr, vm) {
        var items = [];
        $.each(arr, function(i, itm) {
            items.push(vm.genCustomData(itm.ID, itm.adSlotId));
        });
        return items;
    };
    var _genSelectedIds = function(arr, vm) {
        var items = [];
        $.each(arr, function(i, itm) {
            items.push(itm.ID);
        });
        return items;
    };
    return function(data, helperData, marketId) {
        var solutionAdSlotSet = new window['__VM']['solutionAdSlotSet'](data, helperData);
		var marketId = helperData["sspMarket"]; 

        // Ajax data
        var _doAjax = function() {
            var data = {
                'onpage': solutionAdSlotSet.list.pager.onPage(),
                'filter': ko.toJS(solutionAdSlotSet.search),
                'selected': solutionAdSlotSet.list.selected()
            };
            var ind = AllYesFactory.loading();
            ind.show('正在加载...');
            $.get(helperData['url'], data, function(json) {
                ind.hide();
                if (json.result == 1) {
                    solutionAdSlotSet.onDataChange(json.data, '');
                } else {
                    solutionAdSlotSet.onDataChange({
                        'list': [],
                        'count': 0,
                        'onPage': 0
                    }, '');
                }

            }, 'json');
        };

        var btnEvent = solutionAdSlotSet.btnEvent;
        // Click pager
        btnEvent.clickPage = function(o, e) {
            e.stopPropagation();
            var $tg = $(e.target);
            if ($tg.is('li')) {
                $tg = $tg.find('a');
            }
            var page = $tg.data('page');
            if (page !== undefined) {
                solutionAdSlotSet.list.pager.onPage(page);
                _doAjax('pager');
            }
        }.bind(solutionAdSlotSet);

        // Get data( from server )
        btnEvent.filterList = function() {
            solutionAdSlotSet.list.pager.onPage(0);
            _doAjax('filter');
        }.bind(solutionAdSlotSet);

        // Select unselected-list items.
        btnEvent.selectItems = function() {
            var checkedList = solutionAdSlotSet.list.checkedOfUnSelectedList();
            checkedList = function(checkedList) {
                var arr = [];
                ko.utils.arrayForEach(checkedList, function(itm) {
                    arr.push(solutionAdSlotSet.splitCustomData(itm));
                });
                return arr;
            }(checkedList);
            solutionAdSlotSet.list.selected.push.apply(solutionAdSlotSet.list.selected, checkedList);
            solutionAdSlotSet.list.pager.onPage(0);
            solutionAdSlotSet.status.checkAllOfUnselected(false);
            _doAjax('select');
        }.bind(solutionAdSlotSet);

        // Remove selected-list items
        btnEvent.removeItems = function() {
            var checkedList = solutionAdSlotSet.list.checkedOfSelectedList();
            // Remove checked items from selected-list
            solutionAdSlotSet.list.selected.remove(function(itm) {
                return ko.utils.arrayIndexOf(checkedList, itm.ID) > -1;
            });
            // Dump checked list.
            solutionAdSlotSet.list.checkedOfSelectedList.removeAll();
            solutionAdSlotSet.status.checkAllOfSelected(false);
            solutionAdSlotSet.list.pager.onPage(0);
            _doAjax('remove');
        }.bind(solutionAdSlotSet);

        // Remove selected-list items
        btnEvent.checkAllOfSelected = function() {
            var v = this.status.checkAllOfSelected();
            this.list.checkedOfSelectedList.removeAll();
            if (v) {
                this.list.checkedOfSelectedList.push.apply(this.list.checkedOfSelectedList, _genSelectedIds(this.list.selected(), this));
            }
            return true;
        }.bind(solutionAdSlotSet);

        // Remove unselected-list items
        btnEvent.checkAllOfUnselected = function() {
            var v = this.status.checkAllOfUnselected();
            this.list.checkedOfUnSelectedList.removeAll();
            if (v) {
                this.list.checkedOfUnSelectedList.push.apply(this.list.checkedOfUnSelectedList, _genUnselectedIds(this.list.unselected(), this));
            }
            return true;
        }.bind(solutionAdSlotSet);

        var __SPLITTER__ = "@##@";
        solutionAdSlotSet.genCustomData = function(id, adSlotId) {
            return id + __SPLITTER__ + adSlotId;
        };
        solutionAdSlotSet.splitCustomData = function(data) {
            data = data.split(__SPLITTER__);
            var id = data[0] || '',
                adSlotId = data[1] || '';
            return {
                "ID": id,
                "adSlotId": adSlotId
            };
        };

        ko.applyBindings(solutionAdSlotSet, $('#solution_ad_slot_picker')[0]);
 

    };
})(window);