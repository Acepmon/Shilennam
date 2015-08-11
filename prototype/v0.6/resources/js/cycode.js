$(function(){ // on dom ready

var cy = cytoscape({
  container: $('#cy')[0],

  style: cytoscape.stylesheet()
    .selector('node')
      .css({
        'content': 'data(name)',
        'text-valign': 'center',
        'color': 'white',
        'text-outline-width': 2,
        'text-outline-color': '#888',
        'source-arrow-shape': 'diamon'
      })
    .selector(':selected')
      .css({
        'background-color': 'black',
        'line-color': 'black',
        'target-arrow-color': 'black',
        'source-arrow-color': 'black',
        'text-outline-color': 'black'
      }),

  elements: {
    nodes: [
      { data: { id: 'desktop', name: 'test', href: '/' } },
      { data: { id: 'js', name: 'test2', href: 'management/' } },
      { data: { id: 'something', name: 'test3', href: 'news.php'} }
    ],
    edges: [
      { data: { source: 'desktop', target: 'js' } },
      { data: { source: 'desktop', target: 'something'}}
    ]
  },

  layout: {
    name: 'breadthfirst',
    fit: true, // whether to fit the viewport to the graph
    directed: false, // whether the tree is directed downwards (or edges can point in any direction if false)
    padding: 30, // padding on fit
    circle: false, // put depths in concentric circles if true, put depths top down if false
    spacingFactor: 1.75, // positive spacing factor, larger => more space between nodes (N.B. n/a if causes overlap)
    boundingBox: undefined, // constrain layout bounds; { x1, y1, x2, y2 } or { x1, y1, w, h }
    avoidOverlap: true, // prevents node overlap, may overflow boundingBox if not enough space
    roots: undefined, // the roots of the trees
    maximalAdjustments: 0, // how many times to try to position the nodes in a maximal way (i.e. no backtracking)
    animate: false, // whether to transition the node positions
    animationDuration: 500, // duration of animation in ms if enabled
    ready: undefined, // callback on layoutready
    stop: undefined // callback on layoutstop
  }
});

cy.on('tap', 'node', function(){
  try { // your browser may block popups
    window.open( this.data('href') );
  } catch(e){ // fall back on url change
    window.location.href = this.data('href');
  }
});


$(".clickable-panel").click(function() {
    if ($(this).attr("data-toggle") === "get_connected_gishuun") {
      var name = $(this).attr("data-target");
      $.post("get_connected_nams.php", {'name' : name}, function(data) {
        alert(data);
      });
    }
});


}); // on dom ready
