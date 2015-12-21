;( function ( nameSpace, undefined ) {
	var console = window.console ? window.console : { log : function () {} };

	if ( nameSpace == undefined ) {
		console.log( 'singleItemsSelectBase: invalid namespace.' );
		return ;
	}

	var _trim = function ( str ){
		var undefined = void 0 ;
		if ( str == undefined || str == null) {
			return '';
		}
		if ( typeof str == 'string' ) {
			var reg = /^\s+|\s+$/g;
			return str.replace( reg, '' );
		}
		return ''; 
	}; 

	var _genEmptyFn = function (){
		return function (){};
	};

	function _updateVisiblePages( self, pages ){ 
		var pager = self.list.pager,
			onPage = pager.onPage(),
			showCount,
			perPage = pager.perPage;

		var i, c=0,
			p = [], 
			MIN = 0, MAX = pages;

		showCount = ( function () {
			var m =  Math.floor( ( pager.showItemsCount - 1 ) / 2 );
			l = m;
			r = pager.showItemsCount - 1 - m; 
			if ( l >= onPage  ){ // Opt left count. 
				r += l - onPage;
				l = onPage ;  
			}  
			if ( r >= MAX - 1  - onPage ){
				l += r - ( MAX - 1 - onPage );
				r = MAX - 1 - onPage;
			}
			return { left: l, right: r };
		} )();  
		// console.log( showCount, '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>' ); 
		if ( onPage >= MIN && onPage < MAX){
			p.push( onPage );
			c++;
		} else { 
			return [];
		} 
		
		// Padding left
		i = onPage;
		c = 0;
		while ( --i >= MIN && ++c <= showCount.left ){
			p.unshift( i );  
		}
		// Padding right
		i = onPage;
		c = 0;
		while ( ++i < MAX && c < showCount.right ){
			p.push( i );
			c++;
		} 
		return p; 
	}	

	nameSpace[ 'solutionAdSlotSet' ]  = function ( data, helperData ) { 
		var self = this;
		// Search helper
		self.search = {};
		var search = self.search;
		search.siteType = ko.observable( '' );
		search.site  = ko.observable( '' );
		search.channel = ko.observable( '' );
		search.adspace = ko.observable( '' );
		search.adSlotId = ko.observable( '' );
		search.width = ko.observable( '' );
		search.height = ko.observable( '' );
		search.size = ko.observable( '' );
		search.position = ko.observable( '' );               

		// Events helper
		self.btnEvent = {};

		// List helper
		self.list = {};
		var list = self.list;
		list.checkAll = ko.observable( false );
		list.unselected = ko.observableArray( [] );
		list.checkedOfUnSelectedList = ko.observableArray( [] );
		list.checkedOfSelectedList = ko.observableArray( [] );
		list.selected = ko.observableArray( data.selected || [] ); // [ { adSlot: "123", ID: 12 }, ... ] 
		list.selected.extend({ rateLimit: 50, throttle: 200 }); // Refer: http://knockoutjs.com/documentation/rateLimit-observable.html

		list.pager = {};
		list.pager.showItemsCount = 5;
		list.pager.perPage = 16; 
		list.pager.onPage = ko.observable( 0 );
		list.pager.total  = ko.observable( 0 );
		list.pager.pages = ko.computed( function () {
			var self = this;
			var _totalCount = list.pager.total(); 
			if ( _totalCount == 0 ){ 
				return 0;
			} else {
				var _p = Math.floor( _totalCount / list.pager.perPage ),
					_m = _totalCount % list.pager.perPage;
				if ( _m > 0 ){
					_p++;
				}
				return _p; 
			} 
		}, self );

		list.pager.visiblePages = ko.computed( function () {
			return _updateVisiblePages( self, list.pager.pages() );
		}, self );


		list.pager.html = ko.computed( function (){
			var self = this;
			var MIN = 0, MAX = list.pager.pages() - 1,
				total = list.pager.total(),
				onPage = list.pager.onPage(),
				visiblePages = list.pager.visiblePages(),
				_html = [];

			if ( total  == 0 )
				return '';
                        MAX = parseInt(MAX); 
                        onPage = parseInt(onPage); 
			if ( visiblePages[ 0 ] == MIN ){
				_html.push( '<li class="first hidden"><a onclick="return false;" data-page="' + MIN + '" href="#first">首页</a></li>' );
				_html.push( '<li class="previous hidden"><a onclick="return false;" data-page="' + MIN + '"  href="#previous">上一页</a></li>' );
			} else {
				_html.push( '<li class="first"><a data-page="' + MIN + '" href="#first">首页</a></li>' );
				_html.push( '<li class="previous"><a data-page="' + ( onPage - 1) + '"  href="#previous">上一页</a></li>' );
			}

			$.each( visiblePages, function ( i, idx ) {
                                idx = parseInt(idx);                                
				if ( idx === onPage )
					_html.push( '<li class="page selected"><a data-page="' + idx + '" href="#' + ( idx + 1 ) + '">' + ( idx + 1 ) + '</a></li>' );
				else
					_html.push( '<li class="page"><a data-page="' + idx + '" href="#' + ( idx + 1 ) + '">' + ( idx + 1 ) + '</a></li>' );
			} );
			if ( visiblePages[ visiblePages.length - 1 ] == MAX ){
				_html.push( '<li class="next hidden"><a onclick="return false;" data-page="' + MAX + '" href="#next">下一页</a></li>' );
				_html.push( '<li class="last hidden"><a onclick="return false;" data-page="' + MAX + '" href="#last">末页</a></li>' );
			} else {
				_html.push( '<li class="next"><a data-page="' + ( onPage + 1) + '" href="#next">下一页</a></li>' );
				_html.push( '<li class="last"><a data-page="' + MAX + '" href="#last">末页</a></li>' );
			}
			return _html.join( '' );
		}, self ); 

		self.onDataChange = function( data, changeLabel ){
			// Reset status.
			list.checkedOfUnSelectedList( [] );
			list.checkAll( false ); 

			list.unselected( data.list );
			list.pager.total( data.count );
			list.pager.onPage( data.onPage ); 
			// Callback handler of event update.
			switch( changeLabel ){
				case 'pager': // From pagination, do something.

					break;
				// ...
				// ...
			}

		};

		// Status
		self.status = {};
		var status = self.status;
		status.selectIsDisable = ko.computed( function (){
			var count = this.list.checkedOfUnSelectedList().length;
			if(  count == 0 )
				return true;
			return false;
		}, self );

		status.removeIsDisable = ko.computed( function (){
			var count = this.list.checkedOfSelectedList().length;
			if(  count == 0 )
				return true;
			return false;
		}, self );
		// CheckAll for selected-list
		status.checkAllOfSelected = ko.observable( false );
		list.checkedOfSelectedList.subscribe( function ( vals ) {
			var checked = vals.length;
			var count = list.selected().length; 
 			if ( checked == count && checked != 0 ){
				status.checkAllOfSelected( true );
			} else {
				status.checkAllOfSelected( false );
			}		
		} ); 
		// CheckAll for unselected-list
		status.checkAllOfUnselected = ko.observable( false );
		list.checkedOfUnSelectedList.subscribe( function ( vals ){
			var checked = vals.length;
			var count = list.unselected().length; 
 			if ( checked == count && checked != 0 ){
				status.checkAllOfUnselected( true );
			} else {
				status.checkAllOfUnselected( false );
			} 
		} );

 	}; 
} )( window[ '__VM' ] =  window[ '__VM' ] || {} );